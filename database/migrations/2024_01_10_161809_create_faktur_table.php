<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFakturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_faktur');
            $table->integer('tahun');
            $table->date('tanggal_pemesanan');
            $table->integer('total_bayar');
            $table->string('metode_pembayaran');
            $table->unsignedInteger('id_pemesanan')->references('id_pemesanan')->on('pemesanan');
            $table->timestamps(); // Assuming you want to have timestamps for created_at and updated_at
        });

        
      
    


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faktur');
    }
}
