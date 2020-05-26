@extends('layouts.apps')

@section('content')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Data Permohonan Pengantar RT/RW</h3>

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
							<h3 class="panel-title">Data Permohonan Pengantar Rt/RW</h3>
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIK</th>
										<th>No Pengantar</th>
										<th>Tanggal Berlaku</th>
										<th>Tanggal Pengantar</th>
										<th>Keperluan</th>
										<th>Lain lain</th>
										<th colspan="3">Kelola Data</th>
									</tr>
								</thead>
								<tbody>
									@forelse($pengantars as $pengantar)
									<tr>
										<td>{{ $pengantar->id}}</td>
										<td>{{ $pengantar->nama}}</td>
										<td>{{ $pengantar->nik}}</td>
										<td>{{ $pengantar->nomor_pengantar}}</td>
										<td>{{ $pengantar->tanggal_berlaku}}</td>
										<td>{{ $pengantar->tanggal_pengantar}}</td>
										<td>{{ $pengantar->keperluan}}</td>
										<td>{{ $pengantar->lain_lain}}</td>
										<td><a href="{{ route('cetak_pdf', $pengantar->id)}}" class="btn btn-primary">Cetak</a></td>
										<td> <form action="{{ route('delete-pengantar', $pengantar->id)}}" method="POST">
											@csrf
											@method('DELETE')
											<button class="btn btn-danger" type="submit">Delete</button>
										</form></td>
										@if ($pengantar->status == 0)
										<td> <a href="{{ route('acc-pengantar', $pengantar->id)}}" class="btn btn-warning">Terima</a></td>
										@endif
									</tr>
									@empty
                                        <tr>
                                            <td colspan="9" class="text-center">Tidak ada data</td>
                                        </tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
					<!-- END BORDERED TABLE -->
				</div>

			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
@endsection