<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proposal;

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

    public function proposal()
    {
        return $this->hasMany(Proposal::class, 'dealer_proposal', 'id');
    }

    public function jumlahpenjualanlpj($tanggal = null, $waktu = null, $tahun = null)
    {
        $this->tahun_a = $tahun;
        $this->tahun_b = substr($waktu, 0, 4);
        $this->bulan_b = substr($waktu, 5, 7);
        $this->tanggal_a = $tanggal;
        $this->waktu = $waktu;

        return $this->hasMany(Proposal::class, 'dealer_proposal', 'id')
                    ->with(['lpj' => function($query){
                        $query->when($this->tahun_a, function ($query_a_t) {
                            return $query_a_t->whereYear('updated_at', $this->tahun_a);
                        })
                        ->when($this->waktu, function ($query_a_w) {
                            return $query_a_w->whereMonth('updated_at', $this->bulan_b)->whereYear('updated_at', $this->tahun_b);
                        })
                        ->when($this->tanggal_a, function ($query_a_g) {
                            return $query_a_g->whereDate('updated_at', $this->tanggal_a);
                        })->sum('target_penjualan_lpj');
                     }]);
    }

    public function scopeCariKota($query, $kota)
    {
        $this->kota = $kota;
        return $query->when($this->kota, function ($query) {
            if( $this->kota != 'SEMUA') {
                return $query->where('kota_dealer', 'like', '%'.$this->kota.'%');
            }
        });
    }
}
