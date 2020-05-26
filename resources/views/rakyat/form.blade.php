@extends('layouts.rakyats')

@section('title')
<title>Form | Klorofil - Free Bootstrap Dashboard Template</title>
@endsection

@section('content')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Buat Surat</h3>
			
			<div class="row">
				<div class="col-md-12">
					@if(session()->get('success'))
					<div class="alert alert-success">
						{{ session()->get('success') }}  
					</div><br/>
					@endif

					<!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Isikan Keperluan Anda</h3>
						</div>
						<div class="panel-body">
							<form method="POST" action="{{ route('rakyat.store-form')}}">
								@csrf
								<label>Nomor Pengantar</label>
								<input type="text" class="form-control" id="nomor_pengantar" name="nomor_pengantar" value="">
								<p class="text-danger">{{ $errors->first('nomor_pengantar') }}</p>
								<br>

								<label>Nomor Induk Kependudukan</label>
								<input type="numeric" class="form-control" id="nik" name="nik" value="">
								<p class="text-danger">{{ $errors->first('nik') }}</p>
								<br>

								<label>Nama Lengkap</label>
								<input type="text" class="form-control" id="nama" name="nama" value="">
								<p class="text-danger">{{ $errors->first('nama') }}</p>
								<br>

								<label>Tanggal Berlaku</label>
								<input type="date" class="form-control" id="tanggal_berlaku" name="tanggal_berlaku" value="">
								<p class="text-danger">{{ $errors->first('tanggal_berlaku') }}</p>
								<br>

								<label>Tanggal Pengantar</label>
								<input type="date" class="form-control" id="tanggal_pengantar" name="tanggal_pengantar" value="">
								<p class="text-danger">{{ $errors->first('tanggal_pengantar') }}</p>
								<br>
								
								<label>Keperluan</label>
								<input type="text" class="form-control" id="keperluan" name="keperluan" value="">
								<p class="text-danger">{{ $errors->first('keperluan') }}</p>
								<br>

								<label>Lain lain</label>
								<input type="text" class="form-control" id="lain_lain" name="lain_lain" value="">
								<p class="text-danger">{{ $errors->first('lain_lain') }}</p>
								<br>

								<button class="btn btn-primary"> Tambah </button>
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