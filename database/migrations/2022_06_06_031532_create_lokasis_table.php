<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasis', function (Blueprint $table) {
            $table->id();
            $table->string('kota_lokasi')->nullable();
            $table->string('kecamatan_lokasi')->nullable();
            $table->string('kelurahan_lokasi')->nullable();
            $table->string('prov_lokasi')->nullable();
            $table->string('area_lokasi')->nullable();
            $table->string('keterangan_lokasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lokasis');
    }
}
