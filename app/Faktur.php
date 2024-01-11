<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    protected $table = 'faktur';

    protected $fillable = [
        'kode_faktur',
        'tahun',
        'tanggal_pemesanan',
        'total_bayar',
        'metode_pembayaran',
        'id_pemesanan',
    ];

    // Tambahkan properti timestamps untuk mengaktifkan timestamp otomatis
    public $timestamps = true;

    // Relasi dengan model Pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }
}
