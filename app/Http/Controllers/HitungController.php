<?php

namespace App\Http\Controllers;

use App\Models\bobot_selisih;
use App\Models\core_fk;
use App\Models\hitung;
use App\Models\kriteria;
use App\Models\data_uji;
use App\Models\hitung_gap;
use App\Models\hitung_selisih;
use App\Models\nilai_akhir;
use App\Models\pm_detail_data_uji;
use App\Models\secondary_fk;
use App\Models\value_data_uji;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = kriteria::with(['value'])->get();
        // dd($kriteria);
        return view('hitung.index', compact('kriteria'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ini_set('max_execution_time', 0);
        $data = $request->all();
        $kriteria = kriteria::all();
        $tmp_core = 0 ;
        $tmp_secondary = 0;
        $jmlCore = 0;
        $jmlSecnd = 0;
        $res=[];
        $value_user=0;
        // Selisih Nilai User
        foreach($kriteria as $k){
            $sel = $data['kode_data'][$k->kode_kriteria]-$k->bobot; 
            $p = bobot_selisih::where('selisih',$sel)->get();
            // dd($p);
            if($k->faktor =='core'){
                $tmp_core += $p[0]->nilai_pembobotan;
                $jmlCore++;
            }
            if($k->faktor =='secondary'){
                $tmp_secondary += $p[0]->nilai_pembobotan;
                $jmlSecnd++;
            }
            array_push($res,$p[0]->nilai_pembobotan);
                    
        }
            // dd($res);

         if($tmp_core != 0){
            $core = $tmp_core/$jmlCore;
         }
         if($tmp_core == 0){
            $core = $tmp_core;
         }
         if($tmp_secondary !=0){
           $second = $tmp_secondary/$jmlSecnd;
        }
        if($tmp_secondary ==0){
            $second =  $tmp_secondary;
        }

        $f_result = 0;
        if($core ==0 && $second ==0){
            $f_result = $core +$second;
        }
        if($core ==0 ){
            $f_result = $core +(($second*40)/100);
        }
        if($second ==0 ){
            $f_result = (($core*60)/100) +$second;
        }
        if($second !=0 && $second != 0 ){
            $f_result = (($core*60)/100) +(($second*40)/100);
        }
         
        $value_user = $f_result;


        // Data Uji 

        $data_encode = json_encode($data['kode_data']);
        $hitung = new hitung();
        $hitung->kode_data = $data_encode;
        $hitung->save();
        $id_hitung = $hitung->id_hitung;
        $tmp_gap = [];
        $kriteria = [];
        $dataU=data_uji::all();
        foreach($dataU as $kd){ 
            $tmp_core = 0 ;
            $tmp_secondary = 0;
            $jmlCore = 0;
            $jmlSecnd = 0;
            $val_dt=value_data_uji::where('id_data_uji',$kd->id_data_uji)->get();
            foreach($val_dt as $val){
                // selisih
                $k=kriteria::where('id_kriteria',$val->id_kriteria)->get();
                // dd($k[0]['bobot']);
                $selisih = $val->nilai_data_uji - $k[0]['bobot'];
                $tmpSelisih = [
                        'id_hitung' => $id_hitung,
                        'id_data_uji' => $val->id_data_uji,
                        'id_kriteria' => $val->id_kriteria,
                        'nilai_selisih' => $selisih
                    ];
                hitung_selisih::insert($tmpSelisih);

                // nilai gap
                $bobot_selisih = bobot_selisih::where('selisih',$selisih)->get();
                $tmpGAP = [
                 'id_hitung' => $id_hitung,
                 'id_data_uji' => $val->id_data_uji,
                 'id_kriteria' => $val->id_kriteria,
                 'nilai_gap' => $bobot_selisih[0]->nilai_pembobotan
                ];
                hitung_gap::insert($tmpGAP);

                if($k[0]['faktor'] == 'core'){
                    $jmlCore++;
                    $tmp_core += $bobot_selisih[0]->nilai_pembobotan;
                }
                if($k[0]['faktor'] == 'secondary'){
                    $jmlSecnd++;
                    $tmp_secondary += $bobot_selisih[0]->nilai_pembobotan;
                }
            }

            $temp_cf = 0;
            $temp_sf = 0;
             if($tmp_core != 0){
                $core = [
                 'id_hitung' => $id_hitung,
                 'id_data_uji' => $kd->id_data_uji,
                 'nilai_core_faktor' => $tmp_core/$jmlCore
             ];
             $temp_cf=$tmp_core/$jmlCore;
            }
            if($tmp_core == 0){
                $core = [
                 'id_hitung' => $id_hitung,
                 'id_data_uji' => $kd->id_data_uji,
                 'nilai_core_faktor' => $tmp_core
             ];
             $temp_cf=$tmp_core;
            }
            if($tmp_secondary !=0){
                $second = [
                 'id_hitung' => $id_hitung,
                 'id_data_uji' => $kd->id_data_uji,
                 'nilai_secondary_faktor' => $tmp_secondary/$jmlSecnd
             ];
             $temp_sf=$tmp_secondary/$jmlSecnd;
            }
            if($tmp_secondary ==0){
                $second = [
                 'id_hitung' => $id_hitung,
                 'id_data_uji' => $kd->id_data_uji,
                 'nilai_secondary_faktor' => $tmp_secondary
             ];
             $temp_sf=$tmp_secondary/$jmlSecnd;
            }
            core_fk::insert($core);
            secondary_fk::insert($second);


              if($temp_cf ==0 && $temp_sf ==0){
                    $f_result = $temp_cf +$temp_sf;
                }
                if($temp_cf ==0 ){
                    $f_result = $temp_cf +(($temp_sf*40)/100);
                }
                if($temp_sf ==0 ){
                    $f_result = (($temp_cf*60)/100) +$temp_sf;
                }
                if($temp_cf !=0 && $temp_sf != 0 ){
                    $f_result = (($temp_cf*60)/100) +(($temp_sf*40)/100);
                }
                $nilai_total = [
                 'id_hitung' => $id_hitung,
                 'id_data_uji' => $kd->id_data_uji,
                 'nilai_nilai_akhir' => $f_result
                ];
                nilai_akhir::insert($nilai_total);
            
        }

        
        // Get data dengan nilai total berdasarkan nilai akhir user
        $result_final = nilai_akhir::where('id_hitung',$id_hitung)->where('nilai_nilai_akhir','<=',$value_user)->with('data_uji.detail')->orderBy('nilai_nilai_akhir','DESC')->limit(1)->get();
        
        return $result_final;

    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         $id=$request->get('id_data_uji');
         $data = pm_detail_data_uji::where('id_data_uji',$id)->with('data_uji')->get();
        //  dd($data);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function edit(hitung $hitung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hitung $hitung)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function destroy(hitung $hitung)
    {
        //
    }
}
