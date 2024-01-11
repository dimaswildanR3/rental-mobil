<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Tanggal_Pemesanan');
            $table->date('Tanggal_Booking');
            $table->integer('Jumlah_Hari');
            $table->string('Jaminan');
            $table->unsignedInteger('ID_Pelanggan');
            $table->unsignedInteger('ID_Kendaraan');
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
        Schema::dropIfExists('pemesanan');
    }
}
