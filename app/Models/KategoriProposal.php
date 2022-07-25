<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proposal;
use Illuminate\Support\Carbon;

class KategoriProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'keteragan_kategori',
        'waktu_minimum',
    ];


    public function proposal()
    {
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id');
    }

    public function finalactivity($idkategori)
    {
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')->where('status_proposal', 4)->where('kategori_proposal', $idkategori);
    }

    public function finalactivity_data($idkategori)
    {
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')->where('status_proposal', 4)->where('kategori_proposal', $idkategori);
    }

    public function finalactivitykota($idkategori, $kota)
    {
        $this->kota_ = $kota;
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                    ->where('status_proposal', 4)
                    ->where('kategori_proposal', $idkategori)
                    ->whereHas('dealer', function ($query) {
                        return $query->whereRaw('LOWER(kota_dealer) LIKE ? ', '%'.strtolower($this->kota_).'%');
                    });
    }

    public function akanberjalan($idkategori)
    {
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                        ->where('status_proposal', 4)
                        ->where('kategori_proposal', $idkategori)
                        ->where('periode_start_proposal', '>', Carbon::now()->addDays(1)->format('Y-m-d'));
    }

    public function sedangberjalan($idkategori)
    {
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                        ->where('status_proposal', 4)
                        ->where('kategori_proposal', $idkategori)
                        ->where('periode_start_proposal', '<', Carbon::now()->addDays(1)->format('Y-m-d'))
                        ->where('periode_end_proposal', '>', Carbon::now()->addDays(1)->format('Y-m-d'));
    }

    public function selesai($idkategori)
    {
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                        ->where('status_proposal', 4)
                        ->where('kategori_proposal', $idkategori)
                        ->where('periode_end_proposal', '<', Carbon::now()->addDays(1)->format('Y-m-d'));
    }

    public function jumlahdownloader($idkategori)
    {
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                        ->where('status_proposal', 4)
                        ->where('kategori_proposal', $idkategori)
                        ->sum('target_downloader_proposal');
    }

    public function jumlahdatabase($idkategori)
    {
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                        ->where('status_proposal', 4)
                        ->where('kategori_proposal', $idkategori)
                        ->sum('target_database_proposal');
    }

    public function jumlahpenjualan($idkategori)
    {
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                        ->where('status_proposal', 4)
                        ->where('kategori_proposal', $idkategori)
                        ->sum('target_penjualan_proposal');
    }

    public function jumlahprospectus($idkategori)
    {
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                        ->where('status_proposal', 4)
                        ->where('kategori_proposal', $idkategori)
                        ->sum('target_prospectus_proposal');
    }

}
