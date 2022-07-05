<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpjKonsumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lpj_konsumens', function (Blueprint $table) {
            $table->id();
            $table->integer('id_lpj');
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('gender')->nullable();
            $table->string('notelp')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('pendapatan')->nullable();
            $table->string('nomor_mesin')->nullable();
            $table->string('unit')->nullable(); // type
            $table->integer('id_lokasi')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->integer('id_sales_people')->nullable();
            $table->integer('cash_credit')->nullable(); // 1 CASH / 2 CREDIT
            $table->string('finance_company')->nullable();
            $table->string('hasil')->nullable();
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
        Schema::dropIfExists('lpj_konsumens');
    }
}
