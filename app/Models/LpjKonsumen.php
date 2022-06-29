<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lpj;
use App\Models\SalesPeople;

class LpjKonsumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lpj',
        'nama',
        'alamat',
        'alamat',
        'id_lokasi',
        'notelp',
        'type',
        'status',
        'id_sales_people',
        'cash_credit',
        'finance_company',
        'database',
        'prospecting',
        'polling',
        'reject',
        'ssu',
    ];

    public function lpj()
    {
        return $this->hasOne(Lpj::class, 'id', 'id_lpj');
    }

    public function lokasi()
    {
        return $this->hasOne(Lokasi::class, 'id', 'id_lokasi');
    }

    public function sales()
    {
        return $this->hasOne(SalesPeople::class, 'id', 'id_sales_people');
    }

}
