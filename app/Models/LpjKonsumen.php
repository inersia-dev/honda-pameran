<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lpj;
use App\Models\SalesPeople;
use App\Models\FinanceCompany;
use App\Models\Display;
use Illuminate\Support\Carbon;

class LpjKonsumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lpj',
        'nama',
        'alamat',
        'lokasi',
        'tgl_lahir',
        'gender',
        'notelp',
        'pekerjaan',
        'pendapatan',
        'nomor_mesin',
        'unit',
        'id_lokasi',
        'unit',
        'status',
        'id_sales_people',
        'cash_credit',
        'finance_company',
        'hasil',
        'keterangan',
    ];

    public function lpj()
    {
        return $this->hasOne(Lpj::class, 'id', 'id_lpj');
    }

    public function lokasi_()
    {
        return $this->hasOne(Lokasi::class, 'id', 'id_lokasi');
    }

    public function sales()
    {
        return $this->hasOne(SalesPeople::class, 'id', 'id_sales_people');
    }

    public function finance()
    {
        return $this->hasOne(FinanceCompany::class, 'id', 'finance_company');
    }

    public function display()
    {
        return $this->hasOne(Display::class, 'id', 'unit');
    }

    public function scopeHasil_($query, $h)
    {
        if ($h == 1) {
            return 'Database';
        } elseif ($h == 2) {
            return 'Prospecting';
        } elseif ($h == 3) {
            return 'Polling';
        } elseif ($h == 4) {
            return 'SSU';
        } elseif ($h == 5) {
            return 'Reject';
        } else {
            return '-';
        }
    }

    public function scopeJenis($query, $j)
    {
        if ($j == 1) {
            return 'CASH';
        } elseif ($j == 2) {
            return 'CREDIT';
        } else {
            return '-';
        }
    }

    public function scopeGender_($query, $g)
    {
        if ($g == 1) {
            return 'Laki-laki';
        } elseif ($g == 2) {
            return 'Perempuan';
        } else {
            return '-';
        }
    }

}
