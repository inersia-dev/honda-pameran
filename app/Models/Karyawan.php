<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dealer;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_karyawan',
        'nohp_karyawan',
        'honda_id_karyawan',
        'hso_id_karyawan',
        'dealer_karyawan',
        'gender_karyawan',
        'area_karyawan',
        'jabatan_karyawan',
        'keterangan_karyawan',
    ];

    public function dealer()
    {
        return $this->hasOne(Dealer::class, 'id', 'dealer_karyawan');
    }
}
