@extends("template.main_admin")

@section("title","Parkir Keluar")

@section("content_admin")

<script>
	// Transform PHP variable into json, so it can be cached into js variable
	// Adjust the param with @.json($.your_table_name)
	const park = @json($park);

	function change(select) {

	// Get the id (which is in the value) of the selected option
	let id = select.options[select.selectedIndex].value

	// Find the data in the cached json
	let parkData = park.find(function (p) {
	  // Find it by id
	  return p.id == id
	})

	// For each fields to be shown in the page...
	// Each member of array are the same id from the <input> tag
	// In this case i want three columns to be shown in the page..
	for (let field of ["jenis", "kategori", "created_at"]) {
	  // Put the data to the corresponding element
	  document.getElementById(field).value = parkData[field]
	}

	}
</script>

<!-- start: Content -->
<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Beranda</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Parkir Keluar</a></li>
			</ul>

						

	<div class="row-fluid sortable">		
		<div class="box span7">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>Kendaraan Keluar</h2>
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
						  <th>Waktu Keluar</th>
						  <th>Jenis Kendaraan</th>
						  <th>Kategori Kendaraan</th>
						  <th>Durasi (jam)</th>
						  <th>Biaya (Rp)</th>
						  <th>Status</th>
					  </tr>
				  </thead>   
				  <tbody>
				  	@foreach ($park as $p)
				  	@if (($p->status) == 0)
					<tr>
						<td class="center">{{ $p->id }}</td>
						<td class="center">{{ $p->nopol }}</td>
						<td class="center">{{ $p->updated_at }}</td>
						<td class="center">{{ $p->jenis }}</td>
						<td class="center">{{ $p->kategori }}</td>
						<td class="center">{{ $p->durasi }}</td>
						<td class="center">{{ $p->tarif }}</td>
						<td class="center">
							<a class="label label-important" href="{{ route('detail-keluar', ['park' => $p->id]) }}">Keluar</a>
						</td>
						
					</tr>
					@endif
					@endforeach
				  </tbody>
			  </table>            
			</div>
		</div><!--/span-->
		
	</div><!--/row-->


	<div class="row-fluid sortable" style="margin-left: 670px; margin-top: -900px">
		<div class="box span5">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Form Keluar</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" id="form-keluar" method="POST" action="{{ route('update') }}">
					{{ csrf_field() }}
					<fieldset>
					  <div class="control-group">
						<label class="control-label" for="selectError2">Plat Nomor</label>
						<div class="controls">
							<select data-placeholder="Pilih Nomor Polisi" id="selectError2" data-rel="chosen" onchange="change(this)" name="nopol">
								<option value=""></option>
								@foreach ($park as $p)
									@if (($p->status) == 1)
								  <option value="{{$p->id}}" id="nopol">{{$p->nopol}}</option>
									@endif
								@endforeach
						  </select>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="disabledInput">Jenis Kendaraan</label>
						<div class="controls">
						  <input class="input-large disabled" id="jenis" type="text" placeholder="null" disabled="">
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="disabledInput">Kategori Kendaraan</label>
						<div class="controls">
						  <input class="input-large disabled" id="kategori" type="text" placeholder="null" disabled="">
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="disabledInput">Waktu Masuk</label>
						<div class="controls">
						  <input class="input-large disabled" id="created_at" type="text" placeholder="null" disabled="">
						</div>
					  </div>
					   
					  <div class="form-actions">
						<button type="submit" form="form-keluar" class="btn btn-danger">Keluar</button>
						<button class="btn" type="reset">Batal</button>
					  </div>
					</fieldset>
				</form>
			
			</div>
		</div><!--/span-->
		
	</div><!--/row-->
	

		<!-- <div class="container">
			<button class="btn btn-small btn-danger" data-toggle="modal" data-target="#myModal"><i class="halflings-icon white white remove"></i></button>

			<div class="modal hide fade" id="myModal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h3>Truncate Table</h3>
				</div>
				<div class="modal-body">
					<p>Are you sure?</p>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-danger noty" data-dismiss="modal" data-noty-options='{"text":"Table successfully Truncated","layout":"top","type":"information"}'>Yes</a>
					<a href="#" class="btn" data-dismiss="modal">No</a>
				</div>
			</div>
		</div> -->

</div>

@endsection