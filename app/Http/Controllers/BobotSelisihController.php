<?php

namespace App\Http\Controllers;

use App\Models\bobot_selisih;
use Illuminate\Http\Request;

class BobotSelisihController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bobot = bobot_selisih::all();
        return view('bobot_selisih.index', compact('bobot'));
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
        $data =$request->all();
        $kriteria = bobot_selisih::create($data);

       return redirect()->route('bobot-selisih')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bobot_selisih  $bobot_selisih
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
         $id=$request->get('id_pembobotan');
        $data = bobot_selisih::where('id_pembobotan',$id)->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bobot_selisih  $bobot_selisih
     * @return \Illuminate\Http\Response
     */
    public function edit(bobot_selisih $bobot_selisih)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bobot_selisih  $bobot_selisih
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bobot_selisih $bobot_selisih)
    {
        //
        $data=bobot_selisih::findOrFail($request->id_pembobotan);
       $dataUpdate = $request->all();
       $data->update($dataUpdate);
       return redirect()->route('bobot-selisih')->with('status','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bobot_selisih  $bobot_selisih
     * @return \Illuminate\Http\Response
     */
    public function destroy($bobot_selisih)
    {
        $data = bobot_selisih::find($bobot_selisih);
        $data->delete();

        return redirect()->route('bobot-selisih')->with('status','Data Berhasil di Hapus');
    }
}
