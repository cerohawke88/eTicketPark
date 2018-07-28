<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ManualLoginController extends Controller
{
    public function manual() {
    	$credentials = [
    		'username' => 'admin',
    		'password' => 'admin',

    	];

    	if (Auth::attempt($credentials)) {
    		return redirect()->route('admin');
    	}

    	return redirect()->route('login');
    }
}
