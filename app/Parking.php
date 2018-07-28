<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{

	protected $table = 'park';
    protected $fillable = ['jenis', 'kategori', 'nopol', 'durasi', 'biaya', 'status'];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
}
