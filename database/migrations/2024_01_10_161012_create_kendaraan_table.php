<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Merek');
            $table->string('Model');
            $table->string('Warna');
            $table->string('Jenis_Kendaraan');
            $table->string('Nomor_Plat');
            $table->string('Status_Ketersediaan');
            $table->integer('Harga_Sewa_Per_Hari');
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
        Schema::dropIfExists('kendaraan');
    }
}
