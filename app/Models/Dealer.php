<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_dealer',
        'nama_dealer',
        'kota_dealer',
        'alamat_dealer',
        'area_dealer',
        'user_dealer',
    ];
}
