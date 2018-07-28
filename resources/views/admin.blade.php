@extends("template.main_admin")

@section("title","Dashboard")

@section("content_admin")

<!-- start: Content -->
<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Beranda</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dasbor</a></li>
			</ul>

		<div class="row-fluid">
				
				<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
					<img src="img/car-25-88.png" alt="Mobil masuk">
					<div class="number">{{$mobilMasuk}}<i class="icon-arrow-up"></i></div>
					<div class="title">Mobil masuk</div>
					<div class="footer">
						<a href="/parkir-masuk" style="font-weight: bold;"> Selengkapnya</a>
					</div>	
				</div>
				
				<div class="span3 statbox red" onTablet="span6" onDesktop="span3">
					<img src="img/car-26-88.png" alt="Mobil keluar">
					<div class="number">{{$mobilKeluar}}<i class="icon-arrow-down"></i></div>
					<div class="title">Mobil keluar</div>
					<div class="footer">
						<a href="/parkir-keluar" style="font-weight: bold;"> Selengkapnya</a>
					</div>
				</div>	

				<div class="span3 statbox blue" onTablet="span6" onDesktop="span3" style="margin-left: -535px; margin-top: 150px">
					<img src="img/motorcycle-88 right.png" alt="Motor masuk">
					<div class="number">{{$motorMasuk}}<i class="icon-arrow-up"></i></div>
					<div class="title">Motor masuk</div>
					<div class="footer">
						<a href="/parkir-masuk" style="font-weight: bold;"> Selengkapnya</a>
					</div>	
				</div>
				
				<div class="span3 statbox red" onTablet="span6" onDesktop="span3" style="margin-top: 150px; margin-left: -253.5px">
					<img src="img/motorcycle-88 left.png" alt="Motor keluar">
					<div class="number">{{$motorKeluar}}<i class="icon-arrow-down"></i></div>
					<div class="title">Motor keluar</div>
					<div class="footer">
						<a href="/parkir-keluar" style="font-weight: bold;"> Selengkapnya</a>
					</div>
				</div>	

				<div class="widget span4 greenDark" onTablet="span6" onDesktop="span4">
					
					<h2><span class="glyphicons pie_chart"><i></i></span> Kapasitas Parkir</h2>
					
					<hr>
					
					<div class="content">
						
						<div class="browserStat big">
							<img src="img/car-25-128.png" alt="Mobil">
							<span style="font-weight: bold; font-size: 30px; color: #76FF03">{{$mobilMasuk}} / 500</span>
						</div>
						<div class="browserStat big">
							<img src="img/motorcycle-128.png" alt="Motor">
							<span style="font-weight: bold; font-size: 30px; color: #76FF03">{{$motorMasuk}} / 1000</span>
						</div>
						
					</div>

				</div>
				
		</div>

</div>
			

@endsection