@extends("template.main_user")

@section("title","Dashboard")

@section("content_user")

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<script>
function date_time(id)
{
    date = new Date;
    year = date.getFullYear();
    month = date.getMonth();
    months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    d = date.getDate();
    day = date.getDay();
    days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    h = date.getHours();
    if(h<10)
    {
            h = "0"+h;
    }
    m = date.getMinutes();
    if(m<10)
    {
            m = "0"+m;
    }
    s = date.getSeconds();
    if(s<10)
    {
            s = "0"+s;
    }
    result = ''+days[day]+' '+months[month]+' '+d+' '+year+' '+h+':'+m+':'+s;
    document.getElementById(id).innerHTML = result;
    setTimeout('date_time("'+id+'");','1000');
    return true;
}
</script>

<!-- Styles -->
<style>
    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 800;
        height: 100vh;
        margin: 0;
        text-align: center;
    }

    .title {
        font-size: 34px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 600px;
    }

</style>

<!-- start: Content -->
<div id="content" class="span10">
            
            
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/">Beranda</a> 
                </li>
            </ul>

        <div class="flex-center position-ref full-height">
             <div class="content" style="font-style: 'Raleway'">
                <div class="title m-b-md">
                    Selamat datang di ITC Mangga Empat Mall!
                </div>
            </div>
        </div>

         {{ auth()->user() }}

        @if (session('success'))
        <div class="alert alert-success alert-dismissable" style="align-items: center; float: left; margin-top: -200px; margin-left: 230px">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
        @endif


         <span id="date_time" style="position: absolute; margin-left: 380px; margin-top: -595px; font-weight: bold; font-size: 20px; color: #636b6f;"></span>
        <script type="text/javascript">window.onload = date_time('date_time');</script>



<!-- start: Form Elements -->
<div class="row-fluid sortable" style="position: absolute; bottom: 28%; left: 30%">
        <div class="box span4">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Input Kendaraan Masuk</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-vertical" id="form-masuk" method="POST" action="{{ route('buat') }}">
                    {{ csrf_field() }}
                    <fieldset>
                     
                      <div class="control-group">
                        <label class="control-label" for="typeahead">Jenis Kendaraan</label>
                        <div class="controls">
                          <select id="opt-jenis" name="jenis">
                            <option value="Motor">Motor</option>
                            <option value="Mobil">Mobil</option>
                          </select>
                        </div>
                      </div>

                        <div class="control-group">
                        <label class="control-label" for="typeahead">Kategori Kendaraan</label>
                        <div class="controls">
                          <select id="opt-kategori" name="kategori">
                            <option value="Umum">Umum</option>
                            <option value="Karyawan">Karyawan</option>
                          </select>
                        </div>
                      </div>

                      <div class="control-group">
                            <label class="control-label" for="typeahead">Nomor Polisi</label>
                            <div class="controls">
                              <input class="span6 typeahead" id="nopol" name="nopol" type="text">
                            </div>
                        </div>
                      <div class="form-actions">
                     <button type="submit" form="form-masuk" class="btn btn-primary">Masuk</button>
                        <button type="reset" class="btn" >Batal</button>
                      </div>
                    </fieldset>
                </form>
            
                </div>
        </div><!--/span-->
    
    </div><!--/row-->

    </div><!--/.fluid-container-->

    <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->
@endsection