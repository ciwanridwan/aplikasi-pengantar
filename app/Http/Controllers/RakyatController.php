<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\PengantarRakyat;
use App\Rakyat;
use PDF;


class RakyatController extends Controller
{
    public function cetakPdf()
    {
        $cetak = PengantarRakyat::all();
        $pdf = PDF::loadview('rakyat.cetak-pdf',['cetak'=>$cetak]);

        return $pdf->stream();
    }
    public function list()
    {
        $list = PengantarRakyat::first()->paginate(10);
        if (request()->nomor_pengantar != '') {
            $list = $list->where('nomor_pengantar', request()->nomor_pengantar);
        }
        return view('rakyat.list', compact('list'));
    }

    public function viewSurat()
    {
        return view('rakyat.form');
    }

    public function storeSurat(Request $request)
    {
        $validasi = $request->validate([
            'nik' => 'required|numeric|unique:pengantar_rakyats|digits:16',
            'nama' => 'required|string',
            'nomor_pengantar' => 'required|unique:pengantar_rakyats|numeric',
            'keperluan' => 'required|string',
            'lain_lain' => 'required|string',
        ]);
        $data = PengantarRakyat::Create($validasi);

        return redirect()->back()->with('success', 'Selamat Data Berhasil Diinput');
    }

    public function logout()
    {
        auth()->guard('rakyat')->logout(); //JADI KITA LOGOUT SESSION DARI GUARD RAKYAT
        return redirect(route('rakyat.login'));
    }

    public function loginForm()
    {
        return view('rakyat.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:rakyats,email',
            'password' => 'required|string'
        ]);
        $auth = $request->only('email', 'password');

        //CUKUP MENGAMBIL EMAIL DAN PASSWORD SAJA DARI REQUEST
    //KARENA JUGA DISERTAKAN TOKEN
        if (auth()->guard('rakyat')->attempt($auth)) {
        //JIKA BERHASIL MAKA AKAN DIREDIRECT KE DASHBOARD
            return redirect()->intended(route('rakyat.dashboard'));
        }
        // dd($auth);
    //JIKA GAGAL MAKA REDIRECT KEMBALI BERSERTA NOTIFIKASI
        return redirect()->back()->with(['error' => 'Email / Password Salah']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('rakyat.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rakyat.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
         'name' => 'required|string|max:255',
         'email' => 'required|email|unique:rakyats',
         'password' => 'required|string|min:8|confirmed',
     ]);

       if (!auth()->guard('rakyat')->check()) {
        $rakyat = Rakyat::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make([$request->password]),
            'remember_token' => Str::random(30),

        ]);
    }
    return redirect(route('rakyat.login'))->with('success', 'Selamat data berhasil ditambah!');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
