<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Parking;

class FrontController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function home () {
		return view ('home');
	}

	public function login () {
		return view ('login');
	}

	public function create(Request $request)
    {

        // echo "Yatta!";
        
        // dd($request->all());

    	$request->validate([
    		'jenis' => 'in:Motor,Mobil',
    		'kategori' => 'in:Umum,Karyawan',
    		'nopol' => 'required|string',

    	]);

        // $park = Parking::create([
        //     'jenis' => $request->input('jenis'),
        //     'kategori' => $request->input('kategori'),
        //     'nopol' => $request->input('nopol'),
        // ]);

        $park = Parking::create($request->only(['jenis','kategori','nopol']));


        return back()-> with('success', 'Silakan masuk! ID parkir anda '. $park->id .' dengan nomor polisi '. $park->nopol . ' pada ' . $park->created_at);


    }

}
