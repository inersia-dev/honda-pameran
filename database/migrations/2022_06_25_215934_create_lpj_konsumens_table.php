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
            $table->string('alamat')->nullable();
            $table->integer('id_lokasi')->nullable();
            $table->string('notelp')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->integer('id_sales_people')->nullable();
            $table->integer('cash_credit')->nullable(); // 1 CASH / 2 CREDIT
            $table->integer('finance_company')->nullable();
            $table->boolean('database')->default(false);
            $table->boolean('prospecting')->default(false);
            $table->boolean('polling')->default(false);
            $table->boolean('reject')->default(false);
            $table->boolean('ssu')->default(false);
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
