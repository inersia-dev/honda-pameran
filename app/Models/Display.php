<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_display',
        'nama_display',
        'unit_display',
        'gambar_display',
        'warna_display',
        'spesifikasi_display',
        'keterangan_display',
    ];
}
