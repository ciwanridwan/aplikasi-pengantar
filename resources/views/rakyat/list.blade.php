@extends('layouts.rakyats')

@section('content')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Status Pengantar</h3>

			<div class="row">
				<div class="col-md-16">
					@if(session()->get('success'))
					<div class="alert alert-success">
						{{ session()->get('success') }}  
					</div><br/>
					@endif
					<!-- BORDERED TABLE -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Status Pengantar</h3>
						</div>
						<div class="panel-body">
							<form action="{{ route('rakyat.list') }}" method="get">
                                <div class="input-group mb-3 col-md-6 float-right">
                                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request()->q }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Lengkap</th>
										<th>NIK</th>
										<th>No Pengantar</th>
										<th>Keperluan</th>
										<th>Lain lain</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($list as $pengantar)
									<tr>
										<td>{{ $pengantar->id}}</td>
										<td>{{ $pengantar->nama}}</td>
										<td>{{ $pengantar->nik}}</td>
										<td>{{ $pengantar->nomor_pengantar}}</td>
										<td>{{ $pengantar->keperluan}}</td>
										<td>{{ $pengantar->lain_lain}}</td>
										<td>active</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<a href="/penduduk/pengantar/cetak-pdf" class="btn btn-primary" target="_blank">CETAK</a>
					</div>
					<!-- END BORDERED TABLE -->
					{!! $list->links() !!}
				</div>

			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection