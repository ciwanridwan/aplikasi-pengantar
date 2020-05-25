<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengantar;
use PDF;

class PengantarController extends Controller
{
   public function cetak_pdf()
   {
    $pengantar = Pengantar::all();

    $pdf = PDF::loadview('pengantar.cetak_pdf',['pengantar'=>$pengantar]);
    // return $pdf->download('laporan-pengantar-pdf.pdf');
    return $pdf->stream();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengantars = Pengantar::all();
        return view('pengantar.table', compact('pengantars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengantar.form');
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
            'nik' => 'required|numeric|exists:penduduks|digits:16',
            'nomor_pengantar' => 'required|unique:pengantars|string',
            'nama' => 'required|string|exists:penduduks',
            'tanggal_berlaku' => 'required|date',
            'tanggal_pengantar' => 'required|date',
            'keperluan' => 'required|string',
            'lain_lain' => 'required|string'
        ]);
        $data = Pengantar::Create($validasi);

        return redirect()->back()->with('Success, Data Permohonan Pengantar Berhasil Dibuat');
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
    public function edit(Pengantar $pengantar)
    {
        return view('pengantar.edit', compact('pengantar'));
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
        'nomor_pengantar' => 'required|string',
        'nama' => 'required|string',
        'tanggal_berlaku' => 'required|date',
        'tanggal_pengantar' => 'required|date',
        'keperluan' => 'required|string',
        'lain_lain' => 'required|string'
    ]);
     Pengantar::whereId($id)->update($validasi);

     return redirect(route('table-pengantar'))->with('success', 'Data berhasil di update');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengantar = Pengantar::findOrFail($id);
        $pengantar->delete();

        // return redirect('pengantar.table')->with('success', 'Data berhasil dihapus!');
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
