<?php

namespace App\Http\Controllers;
use App\Models\kriteria;
use App\Models\value_set;
use Illuminate\Http\Request;

class ValueSetController extends Controller
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
        $value = value_set::join('master_kriteria', 'master_kriteria.id_kriteria', '=', 'kriteria_value_set.id_kriteria')->get(['kriteria_value_set.*', 'master_kriteria.nama_kriteria']);
        $kriteria = kriteria::all();
        // dd($value);
        return view('value_set.index', compact('value','kriteria'));
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
         $data =$request->all();
        // dd($data);
        $value = value_set::create($data);

       return redirect()->route('value-set')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\value_set  $value_set
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
         $value_set=$request->get('id_value_set');
        $data = value_set::where('id_value_set',$value_set)->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\value_set  $value_set
     * @return \Illuminate\Http\Response
     */
    public function edit(value_set $value_set)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\value_set  $value_set
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, value_set $value_set)
    {
        //
          $data=value_set::findOrFail($request->id_value_set);
       $dataUpdate = $request->all();
       $data->update($dataUpdate);
    //    dd($data);
       return redirect()->route('value-set')->with('status','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\value_set  $value_set
     * @return \Illuminate\Http\Response
     */
    public function destroy($value_set)
    {
        //
        $data = value_set::find($value_set);
        // dd($data);
        $data->delete();

        return redirect()->route('value-set')->with('status','Data Berhasil di Hapus');
    }
}
