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
        'pekerjaan',
        'pengeluaran',
        'dp',
        'merkmotor',
        'jenismotor',
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

    public function scopeAreaKota($query, $kota)
    {
        $this->kota = $kota;
        return $query->when($this->kota, function ($query_a) {
            if( $this->kota != 'SEMUA') {
                return $query_a->whereHas('lpj', function ($query_b) {
                    return $query_b->whereHas('lokasi', function ($query_c) {
                        return $query_c->whereRaw('LOWER(kota_lokasi) LIKE ? ', '%'.strtolower($this->kota).'%');
                    });
                });
            }
        });
    }

    public function scopeDataDealer($query, $kota)
    {
        $this->kota = $kota;
        return $query->when($this->kota, function ($query_a) {
            if( $this->kota != 'SEMUA') {
                return $query_a->whereHas('lpj', function ($query_p) {
                    return $query_p->whereHas('proposal', function ($query_b) {
                        return $query_b->whereHas('dealer', function ($query_c) {
                            return $query_c->where('id', $this->kota);
                        });
                    });
                });
            }
        });
    }

    public function scopeDataGender($query, $gender)
    {
        return $query->where('gender', $gender);
    }

    public function scopeDataHasil($query, $hasil)
    {
        return $query->where('hasil', $hasil);
    }

    public function scopeDataPekerjaan($query, $pekerjaan)
    {
        return $query->where('pekerjaan', $pekerjaan);
    }

    public function scopeDataDp($query, $dp)
    {
        return $query->where('dp', $dp);
    }

    public function scopeDataPengeluaran($query, $dp)
    {
        return $query->where('dp', $dp);
    }

    public function scopeHasil_($query, $h)
    {
        if ($h == 1) { return 'Database'; }
        elseif ($h == 2) { return 'Prospecting'; }
        elseif ($h == 3) { return 'Polling'; }
        elseif ($h == 4) { return 'SSU'; }
        elseif ($h == 5) { return 'Reject'; }
        else { return '-'; }
    }

    public function scopeJenis($query, $j)
    {
        if ($j == 1) { return 'CASH'; }
        elseif ($j == 2) { return 'CREDIT'; }
        else { return '-'; }
    }

    public function scopeGender_($query, $g)
    {
        if ($g == 1) { return 'Laki-laki'; }
        elseif ($g == 2) { return 'Perempuan'; }
        else { return '-'; }
    }

    public function scopePekerjaan_($query, $p)
    {
        if ($p == 1) { return 'Pegawai Negeri'; }
        elseif ($p == 2) { return 'Pegawai Swasta Pertanian/ Perkebunan/ Kehutanan/ Perikanan/ Peternakan'; }
        elseif ($p == 3) { return 'Pegawai Swasta Industri'; }
        elseif ($p == 4) { return 'Pegawai Swasta Konstruksi'; }
        elseif ($p == 5) { return 'Pegawai Swasta Pertambangan'; }
        elseif ($p == 6) { return 'Pegawai Swasta Jasa'; }
        elseif ($p == 7) { return 'Pegawai Swasta Perdagangan (Retail)'; }
        elseif ($p == 8) { return 'Ojek'; }
        elseif ($p == 9) { return 'Pertanian/ Perkebunan/ Kehutanan/ Perikanan/ Peternakan'; }
        elseif ($p == 10) { return 'Industri'; }
        elseif ($p == 11) { return 'Konstruksi'; }
        elseif ($p == 12) { return 'Pertambangan'; }
        elseif ($p == 13) { return 'Jasa'; }
        elseif ($p == 14) { return 'Perdagangan (Retail)'; }
        elseif ($p == 15) { return 'Mahasiswa/ Pelajar'; }
        elseif ($p == 16) { return 'Guru / Dosen'; }
        elseif ($p == 17) { return 'TNI/ Polri'; }
        elseif ($p == 18) { return 'Ibu Rumah Tangga'; }
        elseif ($p == 19) { return 'Dokter'; }
        elseif ($p == 20) { return 'Pengacara'; }
        elseif ($p == 21) { return 'Wartawan'; }
        elseif ($p == 22) { return 'Petani'; }
        elseif ($p == 23) { return 'Nelayan'; }
        elseif ($p == 24) { return 'Lainnya..'; }
        else { return '-'; }
    }

    public function scopePengeluaran_($query, $l)
    {
        if ($l == 1 ){ return '< Rp 900.000,- ';}
        elseif ($l == 2 ){ return 'Rp 900.001,- s/d Rp 1.250.000,- ';}
        elseif ($l == 3 ){ return 'Rp 1.250.001,- s/d Rp 1.750.000,- ';}
        elseif ($l == 4 ){ return 'Rp 1.750.001,- s/d Rp 2.500.000,- ';}
        elseif ($l == 5 ){ return 'Rp 2.500.001,- s/d Rp 4.000.000,- ';}
        elseif ($l == 6 ){ return 'Rp 4.000.001.- s/d Rp 6.000.000,- ';}
        elseif ($l == 7 ){ return '> Rp 6.000.000,- ';}
        else { return '-'; }
    }

    public function scopeDp_($query, $dp)
    {
        if ($dp == 1) { return '≤ 1 jt';}
        elseif ($dp == 2) { return '1 - 2 jt';}
        elseif ($dp == 3) { return '2 - 3 jt';}
        elseif ($dp == 4) { return '3 - 4 jt';}
        elseif ($dp == 5) { return '4 - 5 jt';}
        elseif ($dp == 6) { return '5 - 6 jt';}
        elseif ($dp == 7) { return '6 - 7 jt';}
        elseif ($dp == 8) { return '7 - 8 jt';}
        elseif ($dp == 9) { return '8 - 9 jt';}
        elseif ($dp == 10) { return '9 - 10 jt';}
        elseif ($dp == 11) { return '> 10 jt';}
        else { return '-'; }
    }

    public function scopeMerkMotor_($query, $mm)
    {
        if ($mm == 1) { return 'Honda';}
        elseif ($mm == 2) { return 'Yamaha';}
        elseif ($mm == 3) { return 'Suzuki';}
        elseif ($mm == 4) { return 'Kawasaki';}
        elseif ($mm == 5) { return 'Motor Lain';}
        elseif ($mm == 6) { return 'Belum pernah memiliki';}
        else { return '-'; }
    }

    public function scopeJenisMotor_($query, $jm)
    {
        if ($jm == 1) { return 'Sport';}
        elseif ($jm == 2) { return 'Cub (Bebek)';}
        elseif ($jm == 3) { return 'AT (Automatic)';}
        elseif ($jm == 4) { return 'Belum pernah memiliki';}
        else { return '-'; }
    }

}
