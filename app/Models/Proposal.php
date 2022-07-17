<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriProposal;
use App\Models\StatusProposal;
use App\Models\Lokasi;
use App\Models\Karyawan;
use App\Models\Display;
use App\Models\Cabang;
use App\Models\Dealer;
use App\Models\SalesPeople;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'no_proposal',
        'user_proposal',
        'user_approval',
        'inbox_d',
        'inbox_md',
        'status_proposal',
        'status_event_proposal',
        'dealer_proposal',
        'lokasi_proposal',
        'alamat_proposal',
        'display_proposal',
        'finance_proposal',
        'target_database_proposal',
        'target_penjualan_proposal',
        'target_prospectus_proposal',
        'target_downloader_proposal',
        'periode_start_proposal',
        'periode_end_proposal',
        'program_proposal',
        'lat_proposal',
        'long_proposal',
        'keterangan_proposal',
        'foto_lokasi_proposal',
        'dana_proposal',
        'total_dana_proposal',
        'penanggung_jawab_proposal',
        'sales_people_proposal',
        'history_penjualan_proposal',
        'tanggal_status_proposal',
        'kategori_proposal',
        'latar_belakang_proposal',
        'latar_kompetitor_proposal',
        'kondisi_penjualan_m_1_proposal',
        'kondisi_penjualan_m1_proposal',
        'tujuan_proposal',
        'tempat_proposal',
    ];

    public function dealer()
    {
        return $this->hasOne(Dealer::class, 'id', 'dealer_proposal');
    }

    public function kategori()
    {
        return $this->hasOne(KategoriProposal::class, 'id', 'kategori_proposal');
    }

    public function statusp()
    {
        return $this->hasOne(StatusProposal::class, 'id', 'status_proposal');
    }

    public function lokasi()
    {
        return $this->hasOne(Lokasi::class, 'id', 'lokasi_proposal');
    }

    public function display()
    {
        return $this->hasMany(Display::class, 'id', 'display_proposal');
    }

    public function pj()
    {
        return $this->hasOne(SalesPeople::class, 'id', 'penanggung_jawab_proposal');
    }

    public function sales()
    {
        return $this->hasOne(SalesPeople::class, 'id', 'sales_people_proposal');
    }

    public function usercabang()
    {
        return $this->hasOne(Cabang::class, 'id', 'user_proposal');
    }

    public function scopePj($query, $pj)
    {
        $this->pj = $pj;
        if ($this->pj) {
            return $query->whereHas('pj', function ($query) {
                return $query->whereRaw('LOWER(nama_sales_people) LIKE ? ', '%'.strtolower($this->pj).'%');
            });
        }
    }

    public function scopeArea($query, $area)
    {
        $this->area = $area;
        if ($this->area) {
            return $query->whereHas('dealer', function ($query) {
                return $query->whereRaw('LOWER(kota_dealer) LIKE ? ', '%'.strtolower($this->area).'%');
            });
        }
    }

    public function scopeKategori($query, $kategori)
    {
        if ($kategori) {
            return $query->where('kategori_proposal', $kategori);
        }
    }

    public function scopeLokasi($query, $lokasi)
    {
        if ($lokasi) {
            return $query->where('lokasi_proposal', $lokasi);
        }
    }

    public function scopeStatusProposal($query, $status)
    {
        if ($status) {
            return $query->where('status_proposal', $status);
        }
    }

    public function scopeTanggal($query, $tanggal)
    {
        if ($tanggal) {
            return $query->whereDate('created_at', 'LIKE', '%'.$tanggal.'%');
        }
    }

    public function scopeCariDealer($query, $dealer)
    {
        if ($dealer) {
            return $query->where('dealer_proposal', $dealer);
        }
    }

}
