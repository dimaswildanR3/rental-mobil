<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $fillable = [
        'NIK',
        'Nama',
        'Alamat',
        'No_Telepon',
        'Email',
    ];

    // Tambahkan properti timestamps untuk mengaktifkan timestamp otomatis
    public $timestamps = true;

    // Relasi dengan model Pemesanan
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'ID_Pelanggan');
    }
}
