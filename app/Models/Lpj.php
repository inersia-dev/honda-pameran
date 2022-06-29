<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proposal;

class Lpj extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'id_proposal',
        'periode_start_lp',
        'periode_end_lp',
        'lokasi_lpj',
        'target_database_lpj',
        'target_penjualan_lpj',
        'target_prospectus_lpj',
        'dana_lpj',
        'total_dana_lpj',
        'status_lpj',
        'dokumentasi_lpj',
        'problem_identification_lpj',
        'c_lpj',
    ];

    public function proposal()
    {
        return $this->hasOne(Proposal::class, 'id', 'id_proposal');
    }


    public function scopeKategori($query, $kategori)
    {
        $this->kategori = $kategori;
        if ($this->kategori) {
            return $query->whereHas('proposal', function ($query) {
                return $query->where('kategori_proposal', $this->kategori);
            });
        }
    }

    public function scopePj($query, $pj)
    {
        $this->pj = $pj;
        if ($this->pj) {
            return $query->whereHas('proposal', function ($query) {
                return $query->whereHas('pj', function ($query) {
                    return $query->whereRaw('LOWER(nama_sales_people) LIKE ? ', '%'.strtolower($this->pj).'%');
                });
            });
        }
    }

    public function scopeSubmitDate($query, $submitdate)
    {
        if ($submitdate) {
            return $query->where('created_at', 'LIKE', '%'.$submitdate.'%');
        }
    }

}
