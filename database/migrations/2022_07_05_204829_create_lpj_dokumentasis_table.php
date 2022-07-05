<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpjDokumentasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lpj_dokumentasis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lpj');
            $table->string('kode')->nullable();
            $table->string('foto')->nullable();
            $table->string('jenis')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('lpj_dokumentasis');
    }
}
