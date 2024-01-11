<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'nama',
        'alamat',
        'notelp',
        'email',
        'tanggal_lahir',
        'jabatan',
        'gaji',
        'mulai_kerja',
        'jam_kerja',
    ];
}
