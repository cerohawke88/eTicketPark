@extends("template.main_admin")

@section("title","Parkir Masuk")

@section("content_admin")


<!-- start: Content -->
<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Beranda</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Parkir Masuk</a></li>
			</ul>


	<div class="row-fluid sortable">		
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white user"></i><span class="break"></span>Kendaraan Masuk</h2>
					<div class="box-icon">
						<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
						<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
					  <thead>
						  <tr>
						  	  <th>ID</th>
							  <th>Nomor Polisi</th>
							  <th>Waktu Masuk</th>
							  <th>Jenis Kendaraan</th>
							  <th>Kategori Kendaraan</th>
							  <th>Status</th>
						  </tr>
					  </thead>   
					  <tbody>
					    @foreach ($park as $p)
					    @if (($p->status) == 1)
						<tr>
							<td class="center">{{ $p->id }}</td>
							<td class="center">{{ $p->nopol }}</td>
							<td class="center">{{ $p->created_at }}</td>
							<td class="center">{{ $p->jenis }}</td>
							<td class="center">{{ $p->kategori }}</td>
							<td class="center">
								<a class="label label-info" href="{{ route('detail-masuk', ['park' => $p->id]) }}">Masuk</a>
							</td>
						</tr>
						@endif
						@endforeach
					  </tbody>
				  </table>            
				</div>
			</div><!--/span-->
		
		</div><!--/row-->

</div>

@endsection