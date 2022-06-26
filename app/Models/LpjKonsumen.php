<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
