<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $fillable = [
        'Tanggal_Pemesanan',
        'Tanggal_Booking',
        'Jumlah_Hari',
        'Jaminan',
        'ID_Pelanggan',
        'ID_Kendaraan',
    ];

    // Tambahkan properti timestamps untuk mengaktifkan timestamp otomatis
    public $timestamps = true;

    // Relasi dengan model Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'ID_Pelanggan');
    }

    // Relasi dengan model Kendaraan
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'ID_Kendaraan');
    }
}
