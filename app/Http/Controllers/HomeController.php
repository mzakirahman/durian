<?php

namespace App\Http\Controllers;

use App\Models\data_uji;
use App\Models\hitung;
use App\Models\kriteria;
use App\Models\sub_kriteria;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_uji = data_uji::count();
        $kriteria = kriteria::count();
        $hitung = hitung::count();
        return view('home', compact('data_uji','kriteria','hitung'));
        // return view('home');
    }
}
