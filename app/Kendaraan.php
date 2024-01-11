<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
  
   protected $table = 'kendaraan';

  
   protected $fillable = [
       'Merek',
       'Model',
       'Warna',
       'Jenis_Kendaraan',
       'Nomor_Plat',
       'Status_Ketersediaan',
       'Harga_Sewa_Per_Hari',
   ];
}
