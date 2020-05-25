@extends('layouts.apps')

@section('content')
@section('title')
<title>Edit | Klorofil - Free Bootstrap Dashboard Template</title>
@endsection

@section('content')
<!-- MAIN -->
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      <h3 class="page-title">Edit Data Penduduk</h3>
      <div class="row">
        <div class="col-md-6">
          @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div><br/>
          @endif

          <!-- INPUTS -->
          <div class="panel">
            <div class="panel-body">
            <form method="POST" action="{{ route('update', $penduduk->id)}}">
              @csrf
              @method('PUT')

              <label>ID</label>
              <input type="numeric" class="form-control" id="id" name="id" value="{{$penduduk->id}}" readonly>
              <p class="text-danger">{{ $errors->first('id') }}</p>
              <br>

              <label>Nomor Induk Kependudukan</label>
              <input type="numeric" class="form-control" id="nik" name="nik" value="{{$penduduk->nik}}">
              <p class="text-danger">{{ $errors->first('nik') }}</p>
              <br>

              <label>Nama Lengkap</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{$penduduk->nama}}">
              <p class="text-danger">{{ $errors->first('nama') }}</p>
              <br>

              <label>Alamat</label>
              <input type="address" class="form-control" id="alamat" name="alamat" value="{{$penduduk->alamat}}">
              <p class="text-danger">{{ $errors->first('alamat') }}</p>
              <br>

              <label>Tempat Lahir</label>
              <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$penduduk->tempat_lahir}}">
              <p class="text-danger">{{ $errors->first('tempat_lahir') }}</p>
              <br>

              <label>Tanggal Lahir</label>
              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$penduduk->tanggal_lahir}}">
              <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
              <br>

              <label> Status</label>
              <select class="form-control" id="status" name="status">
                <option value="{{$penduduk->status}}">{{$penduduk->status}}</option>
                <option>Menikah</option>
                <option>Belum Menikah</option>
                <option>Duda</option>
                <option>Janda</option>
              </select>
              <p class="text-danger">{{ $errors->first('status') }}</p>
              <br>

              <label>Pekerjaan</label>
              <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{$penduduk->pekerjaan}}">
              <p class="text-danger">{{ $errors->first('pekerjaan') }}</p>
              <br>

              <label> Pilih Agama</label>
              <select class="form-control" id="agama" name="agama">
                <option value="{{$penduduk->agama}}">{{$penduduk->agama}}</option>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Katolik</option>
                <option>Budha</option>
                <option>Hindu</option>
              </select>
              <p class="text-danger">{{ $errors->first('agama') }}</p>
              <br>

              <label> Pendidikan Terakhir </label>
              <select class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir">
                <option value="{{$penduduk->pendidikan_terakhir}}">{{$penduduk->pendidikan_terakhir}}</option>
                <option>S3</option>
                <option>S2</option>
                <option>S1</option>
                <option>D3</option>
                <option>SMK/SMA/MA</option>
                <option>SMP/MTS</option>
                <option>SD</option>
              </select>
              <p class="text-danger">{{ $errors->first('pendidikan_terakhir') }}</p>
              <br>

              <label> Jenis Kelamin</label>
              <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value="{{$penduduk->jenis_kelamin}}">{{$penduduk->jenis_kelamin}}</option>
                <option>Pria</option>
                <option>Perempuan</option>
              </select>
              <p class="text-danger">{{ $errors->first('jenis_kelamin') }}</p>
              <br>

              <label>RT</label>
              <input type="numeric" class="form-control" id="rt" name="rt" value="{{$penduduk->rt}}">
              <p class="text-danger">{{ $errors->first('rw') }}</p>
              <br>

              <label>RW</label>
              <input type="numeric" class="form-control" id="rw" name="rw" value="{{$penduduk->rw}}">
              <p class="text-danger">{{ $errors->first('rw') }}</p>
              <br>

              <label>Kewarganegaraan</label>
              <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="{{$penduduk->kewarganegaraan}}">
              <p class="text-danger">{{ $errors->first('kewarganegaraan') }}</p>
              <br>

              <button class="btn btn-primary"> Edit </button>
            </form>
          </div>
        </div>
        <!-- END INPUTS -->

      </div>

    </div>
  </div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection