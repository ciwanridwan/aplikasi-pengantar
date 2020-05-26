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
                                <div class="input-group mb-3 col-md-3 float-right">
                                    <input type="text" name="nomor_pengantar" class="form-control" placeholder="Masukkan nomor pengantar" value="{{ request()->nomor_pengantar }}">
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
										<th>Tanggal Berlaku</th>
										<th>Tanggal Pengantar</th>
										<th>Keperluan</th>
										<th>Lain lain</th>
										<th colspan="2">Status</th>
									</tr>
								</thead>
								<tbody>
									@forelse($list as $pengantar)
									<tr>
										<td>{{ $pengantar->id}}</td>
										<td>{{ $pengantar->nama}}</td>
										<td>{{ $pengantar->nik}}</td>
										<td>{{ $pengantar->nomor_pengantar}}</td>
										<td>{{ $pengantar->tanggal_berlaku}}</td>
										<td>{{ $pengantar->tanggal_pengantar}}</td>
										<td>{{ $pengantar->keperluan}}</td>
										<td>{{ $pengantar->lain_lain}}</td>
										@if ($pengantar->status == 0)
											<td>Proses</td>
										@else
											<td>Selesai</td>
										@endif 
										<td><a href="{{ route('cetak-pdf', ['id' => $pengantar->id])}}" class="btn btn-primary" target="_blank">CETAK</a></td>
									</tr>
									{!! $list->links() !!}
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