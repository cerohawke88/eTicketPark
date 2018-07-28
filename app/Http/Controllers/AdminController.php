<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Parking;

use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $motorMasuk = Parking::where([['jenis', '=', 'Motor'], ['status', '=', 1]])->count();
        $mobilMasuk = Parking::where([['jenis', '=', 'Mobil'], ['status', '=', 1]])->count();
        $motorKeluar = Parking::where([['jenis', '=', 'Motor'], ['status', '=', 0]])->count();
        $mobilKeluar = Parking::where([['jenis', '=', 'Mobil'], ['status', '=', 0]])->count();
        $getMasuk = Parking::where([['status', '=', 1]])->get();
        $countMasuk = Parking::where([['status', '=', 1]])->count();
        $park = Parking::all();
        $admin = DB::table('users')->pluck('username');
        // $masuk = Parking::where([['status', '=', 1]])->pluck('created_at');
        // //$masuk = Parking::find($getMasuk)->created_at;
        // $now = Carbon::now();
        //$waktu = $now->diffForHumans($masuk);

        return view('admin', [
                'motorMasuk' => $motorMasuk, 
                'mobilMasuk' => $mobilMasuk, 
                'motorKeluar' => $motorKeluar, 
                'mobilKeluar' => $mobilKeluar,
                'getMasuk' => $getMasuk,
                'countMasuk' => $countMasuk,
                'park' => $park,
                'admin' => $admin,
                // 'masuk' => $masuk,
                // 'now' => $now,
                // 'waktu' => $waktu,
            ]);

        // echo $masuk;
        
    }

    public function masuk(Request $request)
    {
        $getMasuk = Parking::where([['status', '=', 1]])->get();
        $countMasuk = Parking::where([['status', '=', 1]])->count();
        $park = Parking::all();
        // $masuk = Parking::find($getMasuk)->created_at;
        // $now = Carbon::now();
        // $waktu = $now->diffForHumans($masuk);
        return view('masuk', [
                'park' => $park, 
                'getMasuk' => $getMasuk,
                'countMasuk' => $countMasuk,
                // 'masuk' => $masuk,
                // 'now' => $now,
                // 'waktu' => $waktu,
            ]);
    }

    public function keluar()
    {
        $getMasuk = Parking::where([['status', '=', 1]])->get();
        $countMasuk = Parking::where([['status', '=', 1]])->count();
        $park = Parking::all();
        // $masuk = Parking::find($getMasuk)->created_at;
        // $now = Carbon::now();
        // $waktu = $now->diffForHumans($masuk);
        return view('keluar', [
                'park' => $park, 
                'getMasuk' => $getMasuk,
                'countMasuk' => $countMasuk,
                // 'masuk' => $masuk,
                // 'now' => $now,
                // 'waktu' => $waktu,
            ]);
    }

    public function update(Request $request)
    {

        //retrieve id value of selected nopol from dropdown
        //with 'nopol' as a name attribute from <select> tag
        $getId = $request->get('nopol');

        //retrieve value of certain column that corresponds with selected nopol
        $masuk = Parking::find($getId)->created_at;
        $keluar = Carbon::now();
        $kategori = Parking::find($getId)->kategori;
        $jenis = Parking::find($getId)->jenis;

        //waktu keluar - waktu masuk
        $durasi = $masuk->diffInHours($keluar);

        //echo $keluar;

        //calculation of tarif
        if ($kategori == 'Umum' && $jenis == 'Motor') {
            $tarif = 2000 * $durasi;
        }
        elseif ($kategori == 'Umum' && $jenis == 'Mobil') {
            $tarif = 3000 * $durasi;
        }
        elseif ($kategori == 'Karyawan') {
            $tarif = 5000;
        }

        if ($durasi == 0 && $jenis == 'Motor' && $kategori != 'Karyawan') {
            $tarif = 2000;
        }
        elseif ($durasi == 0 && $jenis == 'Mobil' && $kategori != 'Karyawan') {
            $tarif = 3000;
        }

        
        //mass update the calculated variable into database
        $update = Parking::where('id', '=', $getId)
        ->update([
            'status' => 0,
            'tarif' => $tarif,
            'durasi' => $durasi,
        ]);

        
        return back();
    }

    public function detail(Parking $park)
    {
        return view('detail', ['park' => $park]);
    }

    public function list()
    {
        $getMasuk = Parking::where([['status', '=', 1]])->get();
        $countMasuk = Parking::where([['status', '=', 1]])->count();
        $park = Parking::all();
        $users = DB::table('users')->get();

        return view('admin_list', [
                'park' => $park, 
                'getMasuk' => $getMasuk,
                'countMasuk' => $countMasuk,
                'users' => $users,
            ]);
    }

}
