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

}
