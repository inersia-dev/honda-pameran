<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJabatanPusat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jabatan',
        'keterangan_jabatan',
    ];

}
