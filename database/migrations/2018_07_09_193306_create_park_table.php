<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('park', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nopol');
            $table->string('jenis');
            $table->string('kategori');
            $table->float('durasi');
            $table->integer('tarif');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('park');
    }
}
