<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_people', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sales_people')->nullable();
            $table->string('nohp_sales_people')->nullable();
            $table->string('honda_id_sales_people')->nullable();
            $table->string('hso_id_sales_people')->nullable();
            $table->string('dealer_sales_people')->nullable();
            $table->string('gender_sales_people')->nullable();
            $table->string('area_sales_people')->nullable();
            $table->string('jabatan_sales_people')->nullable();
            $table->string('keterangan_sales_people')->nullable();
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
        Schema::dropIfExists('sales_people');
    }
}
