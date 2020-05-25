<!DOCTYPE html>
<html>
<head>
	<title>Laporan Permohonan Pengajuan Surat Pengantar RT/RW</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Pengajuan Surat Pengantar Rt/Rw</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>NIK</th>
				<th>No Pengantar</th>
				<th>Tanggal Berlaku</th>
				<th>Tangal Pengantar</th>
				<th>Keperluan</th>
				<th>Lain lain</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($pengantar as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $p->nama }}</td>
				<td>{{ $p->nik }}</td>
				<td>{{ $p->nomor_pengantar }}</td>
				<td>{{ $p->tanggal_berlaku }}</td>
				<td>{{ $p->tanggal_pengantar }}</td>
				<td>{{ $p->keperluan }}</td>
				<td>{{ $p->lain_lain }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>