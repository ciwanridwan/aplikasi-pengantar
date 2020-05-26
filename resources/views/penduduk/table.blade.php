@extends('layouts.apps')

@section('content')
<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Data Penduduk</h3>

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
							<h3 class="panel-title">Data Penduduk</h3>
						</div>
						<div class="panel-body">
							<a href="{{ route('form')}}" class="btn btn-primary" target="_blank">Tambah Data</a>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIK</th>
										<th>Alamat</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Agama</th>
										<th>Status</th>
										<th>Jenis Kelamin</th>
										<th>Pendidikan Terakhir</th>
										<th>Pekerjaan</th>
										<th>Kewarganegaraan</th>
										<th>RT</th>
										<th>RW</th>
										<th colspan="2">Kelola Data</th>
									</tr>
								</thead>
								<tbody>
									@forelse($penduduks as $penduduk)
									<tr>
										<td>{{ $penduduk->id}}</td>
										<td>{{ $penduduk->nama}}</td>
										<td>{{ $penduduk->nik}}</td>
										<td>{{ $penduduk->alamat}}</td>
										<td>{{ $penduduk->tempat_lahir}}</td>
										<td>{{ $penduduk->tanggal_lahir}}</td>
										<td>{{ $penduduk->agama}}</td>
										<td>{{ $penduduk->status}}</td>
										<td>{{ $penduduk->jenis_kelamin}}</td>
										<td>{{ $penduduk->pendidikan_terakhir}}</td>
										<td>{{ $penduduk->pekerjaan}}</td>
										<td>{{ $penduduk->kewarganegaraan}}</td>
										<td>{{ $penduduk->rt}}</td>
										<td>{{ $penduduk->rw}}</td>
										<td><a href="{{ route('edit-penduduk', $penduduk->id)}}" class="btn btn-warning">Edit</a></td>
										<td> <form action="{{ route('delete', $penduduk->id)}}" method="POST">
											@csrf
											@method('DELETE')
											<button class="btn btn-danger" type="submit">Delete</button>
										</form></td>
									</tr>
									@empty
                                        <tr>
                                            <td colspan="15" class="text-center">Tidak ada data</td>
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