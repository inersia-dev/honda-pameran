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

    public function finalactivity($idkategori, $areakota, $iddealer, $tanggal = null, $waktu = null, $tahun = null)
    {
        $this->tahun_a = $tahun;
        $this->tahun_b = substr($waktu, 0, 4);
        $this->bulan_b = substr($waktu, 5, 7);
        $this->tanggal_a = $tanggal;

        $this->areakota = $areakota;
        $this->iddealer = $iddealer;
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                            ->where('status_proposal', 4)
                            ->where('kategori_proposal', $idkategori)
                            ->when($this->areakota, function ($query) {
                                if($this->areakota != 'SEMUA') {
                                    return $query->whereHas('dealer', function ($query) {
                                        return $query->whereRaw('LOWER(kota_dealer) LIKE ? ', '%'.strtolower($this->areakota).'%');
                                    });
                                }
                            })
                            ->when($this->iddealer, function ($query) {
                                if($this->iddealer != 'SEMUA') {
                                    return $query->whereHas('dealer', function ($query) {
                                        return $query->where('id', $this->iddealer);
                                    });
                                }
                            })
                            ->when($this->tahun_a, function ($query_a_t) {
                                return $query_a_t->whereYear('updated_at', $this->tahun_a);
                            })
                            ->when($waktu, function ($query_a_w) {
                                return $query_a_w->whereMonth('updated_at', $this->bulan_b)->whereYear('updated_at', $this->tahun_b);
                            })
                            ->when($this->tanggal_a, function ($query_a_g) {
                                return $query_a_g->whereDate('updated_at', $this->tanggal_a);
                            });
    }

    public function finalactivity_data($idkategori)
    {
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')->where('status_proposal', 4)->where('kategori_proposal', $idkategori);
    }

    public function finalactivitykota($idkategori, $kota, $tanggal = null, $waktu = null, $tahun = null)
    {
        $this->tahun_a = $tahun;
        $this->tahun_b = substr($waktu, 0, 4);
        $this->bulan_b = substr($waktu, 5, 7);
        $this->tanggal_a = $tanggal;

        $this->kota_ = $kota;
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                    ->where('status_proposal', 4)
                    ->where('kategori_proposal', $idkategori)
                    ->whereHas('dealer', function ($query) {
                        return $query->whereRaw('LOWER(kota_dealer) LIKE ? ', '%'.strtolower($this->kota_).'%');
                    })
                    ->when($this->tahun_a, function ($query_a_t) {
                        return $query_a_t->whereYear('updated_at', $this->tahun_a);
                    })
                    ->when($waktu, function ($query_a_w) {
                        return $query_a_w->whereMonth('updated_at', $this->bulan_b)->whereYear('updated_at', $this->tahun_b);
                    })
                    ->when($this->tanggal_a, function ($query_a_g) {
                        return $query_a_g->whereDate('updated_at', $this->tanggal_a);
                    })
                    ;
    }

    public function finalactivitydealer($idkategori, $dealer, $tanggal = null, $waktu = null, $tahun = null)
    {
        $this->tahun_a = $tahun;
        $this->tahun_b = substr($waktu, 0, 4);
        $this->bulan_b = substr($waktu, 5, 7);
        $this->tanggal_a = $tanggal;

        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                    ->where('status_proposal', 4)
                    ->where('kategori_proposal', $idkategori)
                    ->where('dealer_proposal', $dealer)
                    ->when($this->tahun_a, function ($query_a_t) {
                        return $query_a_t->whereYear('updated_at', $this->tahun_a);
                    })
                    ->when($waktu, function ($query_a_w) {
                        return $query_a_w->whereMonth('updated_at', $this->bulan_b)->whereYear('updated_at', $this->tahun_b);
                    })
                    ->when($this->tanggal_a, function ($query_a_g) {
                        return $query_a_g->whereDate('updated_at', $this->tanggal_a);
                    })
                ;
    }

    public function akanberjalan($idkategori, $areakota, $iddealer, $tanggal = null, $waktu = null, $tahun = null)
    {
        $this->tahun_a = $tahun;
        $this->tahun_b = substr($waktu, 0, 4);
        $this->bulan_b = substr($waktu, 5, 7);
        $this->tanggal_a = $tanggal;

        $this->areakota = $areakota;
        $this->iddealer = $iddealer;
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                        ->where('status_proposal', 4)
                        ->where('kategori_proposal', $idkategori)
                        ->where('periode_start_proposal', '>', Carbon::now()->addDays(1)->format('Y-m-d'))
                        ->when($this->areakota, function ($query) {
                                if($this->areakota != 'SEMUA') {
                                    return $query->whereHas('dealer', function ($query) {
                                        return $query->whereRaw('LOWER(kota_dealer) LIKE ? ', '%'.strtolower($this->areakota).'%');
                                    });
                                }
                            })
                        ->when($this->iddealer, function ($query) {
                            if($this->iddealer != 'SEMUA') {
                                return $query->whereHas('dealer', function ($query) {
                                    return $query->where('id', $this->iddealer);
                                });
                            }
                        })
                        ->when($this->tahun_a, function ($query_a_t) {
                            return $query_a_t->whereYear('updated_at', $this->tahun_a);
                        })
                        ->when($waktu, function ($query_a_w) {
                            return $query_a_w->whereMonth('updated_at', $this->bulan_b)->whereYear('updated_at', $this->tahun_b);
                        })
                        ->when($this->tanggal_a, function ($query_a_g) {
                            return $query_a_g->whereDate('updated_at', $this->tanggal_a);
                        })
                        ;
    }

    public function sedangberjalan($idkategori, $areakota, $iddealer, $tanggal = null, $waktu = null, $tahun = null)
    {
        $this->tahun_a = $tahun;
        $this->tahun_b = substr($waktu, 0, 4);
        $this->bulan_b = substr($waktu, 5, 7);
        $this->tanggal_a = $tanggal;

        $this->areakota = $areakota;
        $this->iddealer = $iddealer;
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                        ->where('status_proposal', 4)
                        ->where('kategori_proposal', $idkategori)
                        ->where('periode_start_proposal', '<', Carbon::now()->addDays(1)->format('Y-m-d'))
                        ->where('periode_end_proposal', '>', Carbon::now()->addDays(1)->format('Y-m-d'))
                        ->when($this->areakota, function ($query) {
                                if($this->areakota != 'SEMUA') {
                                    return $query->whereHas('dealer', function ($query) {
                                        return $query->whereRaw('LOWER(kota_dealer) LIKE ? ', '%'.strtolower($this->areakota).'%');
                                    });
                                }
                            })
                        ->when($this->iddealer, function ($query) {
                                if($this->iddealer != 'SEMUA') {
                                    return $query->whereHas('dealer', function ($query) {
                                        return $query->where('id', $this->iddealer);
                                    });
                                }
                        })
                        ->when($this->tahun_a, function ($query_a_t) {
                                return $query_a_t->whereYear('updated_at', $this->tahun_a);
                        })
                        ->when($waktu, function ($query_a_w) {
                            return $query_a_w->whereMonth('updated_at', $this->bulan_b)->whereYear('updated_at', $this->tahun_b);
                        })
                        ->when($this->tanggal_a, function ($query_a_g) {
                            return $query_a_g->whereDate('updated_at', $this->tanggal_a);
                        })
                        ;
    }

    public function selesai($idkategori, $areakota, $iddealer, $tanggal = null, $waktu = null, $tahun = null)
    {
        $this->tahun_a = $tahun;
        $this->tahun_b = substr($waktu, 0, 4);
        $this->bulan_b = substr($waktu, 5, 7);
        $this->tanggal_a = $tanggal;

        $this->areakota = $areakota;
        $this->iddealer = $iddealer;
        return $this->hasMany(Proposal::class, 'kategori_proposal', 'id')
                        ->where('status_proposal', 4)
                        ->where('kategori_proposal', $idkategori)
                        ->where('periode_end_proposal', '<', Carbon::now()->addDays(1)->format('Y-m-d'))
                        ->when($this->areakota, function ($query) {
                                if($this->areakota != 'SEMUA') {
                                    return $query->whereHas('dealer', function ($query) {
                                        return $query->whereRaw('LOWER(kota_dealer) LIKE ? ', '%'.strtolower($this->areakota).'%');
                                    });
                                }
                            })
                        ->when($this->iddealer, function ($query) {
                                if($this->iddealer != 'SEMUA') {
                                    return $query->whereHas('dealer', function ($query) {
                                        return $query->where('id', $this->iddealer);
                                    });
                                }
                            })
                        ->when($this->tahun_a, function ($query_a_t) {
                                return $query_a_t->whereYear('updated_at', $this->tahun_a);
                        })
                        ->when($waktu, function ($query_a_w) {
                            return $query_a_w->whereMonth('updated_at', $this->bulan_b)->whereYear('updated_at', $this->tahun_b);
                        })
                        ->when($this->tanggal_a, function ($query_a_g) {
                            return $query_a_g->whereDate('updated_at', $this->tanggal_a);
                        })
                        ;
    }



}
