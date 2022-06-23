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
        'status_proposal',
        'status_event_proposal',
        'dealer_proposal',
        'lokasi_proposal',
        'alamat_proposal',
        'display_proposal',
        'target_database_proposal',
        'target_penjualan_proposal',
        'target_prospectus_proposal',
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


}