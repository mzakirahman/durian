<?php

namespace App\Http\Controllers;

use App\Models\data_uji;
use App\Models\pm_detail_data_uji;
use Illuminate\Http\Request;

class MDetailDataUjicontroller extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = pm_detail_data_uji::with('data_uji')->get();
        // dd($detail);
        $data_uji = data_uji::all();
        return view('detail_data_uji.index',compact('detail','data_uji'));
    }

    public function indexDetail()
    {
        $detail = pm_detail_data_uji::with('data_uji')->get();
        // dd($detail);
        $data_uji = data_uji::all();
        return view('detail_data_uji.listData',compact('detail','data_uji'));
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
        //
        $data = new pm_detail_data_uji();
        $data['id_data_uji'] = $request->id_data_uji;
        $data['ket_data_uji'] = $request->detail;
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['img']= $filename;
        }

        $data->save();
        return redirect()->route('detailDTU');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pm_detail_data_uji  $pm_detail_data_uji
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id=$request->get('id_detail_data_uji');
        $data = pm_detail_data_uji::where('id_detail_data_uji',$id)->with('data_uji')->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pm_detail_data_uji  $pm_detail_data_uji
     * @return \Illuminate\Http\Response
     */
    public function edit(pm_detail_data_uji $pm_detail_data_uji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pm_detail_data_uji  $pm_detail_data_uji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pm_detail_data_uji $pm_detail_data_uji)
    {
       $data=pm_detail_data_uji::findOrFail($request->id_detail_data_uji);
       $img = '';
    //    dd($request);
       if(empty($request->img)){
        $img = $request->img_old;
       }else{
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $img= $filename;
        }
       }
        $dataUpdate = [
            'id_detail_data_uji'=>$request->id_detail_data_uji,
            'id_data_uji'=>$request->id_data_uji,
            'img'=>$img,
            'ket_data_uji'=>$request->detail
       ];
       $data->id_data_uji = $request->id_data_uji;
       $data->img = $img;
       $data->ket_data_uji = $request->detail;
        
    //    dd($dataUpdate);
    //    dd($data);
       $data->save();
       return redirect()->route('detailDTU')->with('status','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pm_detail_data_uji  $pm_detail_data_uji
     * @return \Illuminate\Http\Response
     */
    public function destroy($pm_detail_data_uji)
    {
        $data = pm_detail_data_uji::find($pm_detail_data_uji);
        // dd($data);
        $data->delete();

        return redirect()->route('detailDTU')->with('status','Data Berhasil di Hapus');
    }
}
