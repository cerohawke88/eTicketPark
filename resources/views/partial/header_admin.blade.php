<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="/"><span>eTicketPark</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
					
						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-bell"></i>
								<span class="badge red">
								{{$countMasuk}} </span>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title">
 									<span>You have {{$countMasuk}} notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								@foreach ($getMasuk as $all)	
                            	<li>
                                    <a href="/parkir-masuk">
                                    	@if ($all->jenis == 'Motor')
											<span class="icon blue"><img src="img/motorcycle-20.png"></img></span>
											<span class="message">{{$all->nopol}} masuk</span>
											<span class="time">1m</span> 
										@elseif ($all->jenis == 'Mobil')
											<span class="icon blue"><img src="img/car-25-20.png"></img></span>
											<span class="message">{{$all->nopol}} masuk</span>
											<span class="time">1m</span> 
										@endif
                                    </a>
                                </li>
                                @endforeach
                                <li class="dropdown-menu-sub-footer">
                            		<a>View all notifications</a>
								</li>	
							</ul>
						</li>
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> {{ Auth::user()->username }}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="/daftar-admin"><i class="halflings-icon user"></i> Daftar Admin</a></li>
								<li><a href="/logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->