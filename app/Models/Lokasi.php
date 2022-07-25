<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kota_lokasi',
        'kecamatan_lokasi',
        'kelurahan_lokasi',
        'prov_lokasi',
        'area_lokasi',
        'keterangan_lokasi',
    ];

    public function scopeAreaKota($query, $kota)
    {
        if (!null == $kota && $kota != 'SEMUA') {
            return $query->whereRaw('LOWER(kota_lokasi) LIKE ? ', '%'.strtolower($kota).'%');
        }
    }
}
