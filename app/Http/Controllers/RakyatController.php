<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\PengantarRakyat;
use App\Rakyat;
use App\Pengantar;
use App\User;

use PDF;


class RakyatController extends Controller
{
    public function surat()
    {
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */
        
        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
        );
        
        /*
         * Note: it's possible to customize font style of the Text element you add in three ways:
         * - inline;
         * - using named font style (new font style object will be implicitly created);
         * - using explicitly created font style object.
         */
        
        // Adding Text element with font customized inline...
        $section->addText(
            '"Great achievement is usually born of great sacrifice, '
                . 'and is never the result of selfishness." '
                . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );
        
        // Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
            '"The greatest accomplishment is not in never falling, '
                . 'but in rising again after you fall." '
                . '(Vince Lombardi)',
            $fontStyleName
        );
        
        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);
        
        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('coba.docx');
        
        // Saving the document as HTML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $objWriter->save('coba.html');

    }
    public function cetakPdf($id)
    {
        $cetak = Pengantar::where('id', '=', $id)->get();
        $pdf = PDF::loadview('rakyat.cetak-pdf',['cetak'=>$cetak]);

        return $pdf->stream();
    }
    
    public function list()
    {
        $list = Pengantar::select('id', 'nama', 'nomor_pengantar', 'nik', 'keperluan', 'lain_lain', 'tanggal_berlaku', 'tanggal_pengantar', 'status');
        if (request()->nomor_pengantar != '') {
            $list = $list->where('nomor_pengantar', request()->nomor_pengantar);
        }
        $list = $list->paginate(10);
        return view('rakyat.list', compact('list'));
    }

    public function viewSurat()
    {
        return view('rakyat.form');
    }

    public function storeSurat(Request $request)
    {
        $validasi = $request->validate([
            'nik' => 'required|numeric|unique:pengantars|digits:16',
            'nama' => 'required|string',
            'nomor_pengantar' => 'required|unique:pengantars|numeric',
            'tanggal_berlaku' => 'required|date',
            'tanggal_pengantar' => 'required|date',
            'keperluan' => 'required|string',
            'lain_lain' => 'required|string',
        ]);
        $data = Pengantar::Create($validasi);

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
            // 'password' => Hash::make([$request->password]),
            'password' => $request->password,
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
