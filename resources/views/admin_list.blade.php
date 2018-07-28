@extends("template.main_admin")

@section("title","Daftar Admin")

@section("content_admin")

<!-- start: Content -->
<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Beranda</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Daftar Admin</a></li>
			</ul>

	<div class="row-fluid sortable">		
					<div class="box span12">
						<div class="box-header" data-original-title>
							<h2><i class="halflings-icon white user"></i><span class="break"></span>Administrators</h2>
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
									  <th>Username</th>
									  <th>Date registered</th>
									  <th>Role</th>
									  <th>Status</th>
									  <th>Actions</th>
								  </tr>
							  </thead>   
							  <tbody>
							  	@foreach ($users as $user)
								<tr>
									<td>{{$user->username}}</td>
									<td class="center">{{$user->created_at}}</td>
									<td class="center">Administrator</td>
									<td class="center">
										<span class="label label-success">Active</span>
									</td>
									<td class="center">
										<a class="btn btn-success" href="/register">
											<i class="halflings-icon white plus"></i>  
										</a>
										<a class="btn btn-danger" href="#">
											<i class="halflings-icon white trash"></i> 
										</a>
									</td>
								</tr>
								@endforeach
							  </tbody>
						  </table>            
						</div>
					</div><!--/span-->
				
				</div><!--/row-->

</div>

@endsection