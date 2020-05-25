<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\Pengantar;
use DB;

class RtController extends Controller
{
    public function read()
    {
        $penduduks = Penduduk::all();
        return view('penduduk.table', compact('penduduks'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penduduk.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nik' => 'required|numeric|unique:penduduks|digits:16',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string',
            'status' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'pekerjaan' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric'
        ]);
        $data = Penduduk::Create($validasi);

        return redirect()->back()->with('success', 'Selamat Data Berhasil Ditambah'); 
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
    public function edit(Penduduk $penduduk)
    {
        return view('penduduk.edit', compact('penduduk'));
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
       $validasi = $request->validate([
        'nik' => 'required|numeric|digits:16',
        'nama' => 'required|string',
        'alamat' => 'required|string',
        'tempat_lahir' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'agama' => 'required|string',
        'status' => 'required|string',
        'jenis_kelamin' => 'required|string',
        'pendidikan_terakhir' => 'required|string',
        'pekerjaan' => 'required|string',
        'kewarganegaraan' => 'required|string',
        'rt' => 'required|numeric',
        'rw' => 'required|numeric'
    ]);
       Penduduk::whereId($id)->update($validasi);

       return redirect(route('table'))->with('success', 'Data berhasil diubah');

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');

    }
}
