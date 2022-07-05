<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LpjDokumentasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lpj',
        'kode',
        'foto',
        'jenis',
        'keterangan'
    ];
}
