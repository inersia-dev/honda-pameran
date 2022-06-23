<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan')->nullable();
            $table->string('nohp_karyawan')->nullable();
            $table->string('honda_id_karyawan')->nullable();
            $table->string('hso_id_karyawan')->nullable();
            $table->string('dealer_karyawan')->nullable();
            $table->string('gender_karyawan')->nullable();
            $table->string('area_karyawan')->nullable();
            $table->string('jabatan_karyawan')->nullable();
            $table->string('keterangan_karyawan')->nullable();

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
        Schema::dropIfExists('karyawans');
    }
}
