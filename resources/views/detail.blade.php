@extends('layouts.app')

@section("title","Rincian Data Pengunjung")

@section("content")

<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<div class="pull-right">
					<a href="{{ route('keluar') }}" class="btn btn-sm btn-link">Kembali</a>
				</div>
				Rincian data pengunjung
			</div>
		<table class="table">
			<tbody>
				<tr>
					<th>ID</th><td>{{ $park->id }}</td>
				</tr>
				<tr>
					<th>Nomor Polisi</th><td>{{ $park->nopol }}</td>
				</tr>
				<tr>
					<th>Jenis Kendaraan</th><td>{{ $park->jenis }}</td>
				</tr>
				<tr>
					<th>Kategori Kendaraan</th><td>{{ $park->kategori }}</td>
				</tr>
				<tr>
					<th>Waktu Masuk</th><td>{{ $park->created_at->toDayDateTimeString() }}</td>
				</tr>
				@if (($park->status) == 0)
				<tr>
					<th>Waktu Keluar</th><td>{{ $park->updated_at->toDayDateTimeString() }}</td>
				</tr>
				@else
				<tr>
					<th>Waktu Keluar</th><td> - </td>
				</tr>
				@endif
				@if (($park->status) == 0)
				<tr>
					<th>Durasi</th><td>{{ $park->durasi }} jam</td>
				</tr>
				@else
				<tr>
					<th>Durasi</th><td> - </td>
				</tr>
				@endif
				@if (($park->status) == 0)
				<tr>
					<th>Biaya</th><td><strong style="font-size: 20px">Rp {{ $park->tarif }}</strong></td>
				</tr>
				@else
				<tr>
					<th>Biaya</th><td> - </td>
				</tr>
				@endif
			</tbody>
		</table>
		</div>
	</div>

@endsection