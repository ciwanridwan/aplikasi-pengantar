<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
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
        $penduduks = Penduduk::all();
        return view('penduduk.table', compact('penduduks'));
    }

    public function login()
    {
        return view('auth.login');
    }
}
