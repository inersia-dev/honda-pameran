<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPeople extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sales_people',
        'nohp_sales_people',
        'honda_id_sales_people',
        'hso_id_sales_people',
        'dealer_sales_people',
        'gender_sales_people',
        'area_sales_people',
        'jabatan_sales_people',
        'keterangan_sales_people',
    ];

    public function dealer()
    {
        return $this->hasOne(Dealer::class, 'id', 'dealer_sales_people');
    }
}
