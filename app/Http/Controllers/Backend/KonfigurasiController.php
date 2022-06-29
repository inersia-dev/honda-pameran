<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\Display;
use App\Models\KategoriProposal;
use App\Models\Lokasi;
use App\Models\Pusat;
use App\Models\UserJabatanPusat;
use App\Models\Cabang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Karyawan;
use App\Models\SalesPeople;
use App\Models\FinanceCompany;

/**
 * Class KonfigurasiController.
 */
class KonfigurasiController  extends Controller
{
    public function index()
    {
        return 'Konfigurasi';
    }

    public function getDealer()
    {
        if (request()->metode == 'tambah') {
            $tambah = new Dealer;
            $tambah->kode_dealer = request()->kode;
            $tambah->nama_dealer = request()->nama;
            $tambah->kota_dealer = Str::upper(request()->kota);
            $tambah->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Ditambah ! ✅');
        }

        if (request()->metode == 'edit') {
            $edit = Dealer::find(request()->id);
            $edit->kode_dealer = request()->kode;
            $edit->nama_dealer = request()->nama;
            $edit->kota_dealer = Str::upper(request()->kota);
            $edit->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Diperbaruhi  ! ✅');
        }

        if (request()->metode == 'hapus') {
            $hapus = Dealer::find(request()->id);
            $hapus->delete();

            return redirect()->back()->withFlashSuccess('Data Berhasil Dihapus ! ✅');
        }

        $datakota = Dealer::select('kota_dealer')->groupBy('kota_dealer')->get();

        $datas = Dealer::when(request()->kota, function ($query) {
                            if (request()->kota != 'SEMUA') {
                                return $query->where('kota_dealer', request()->kota);
                            }
                        })
                        ->when(request()->cari, function ($query) {
                            return $query->where('kode_dealer', 'like', '%'.request()->cari.'%')
                                        ->orWhere('nama_dealer', 'like', '%'.request()->cari.'%');
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('backend.konfigurasi.dealer', compact('datas', 'datakota'));
    }

    public function getUserPusat()
    {
        if (request()->metode == 'tambah') {
            $tambah = new Pusat;
            $tambah->name       = request()->nama;
            $tambah->email      = request()->email;
            $tambah->password   = Hash::make(request()->password);
            $tambah->jabatan    = request()->jabatan;
            $tambah->status     = 2;
            $tambah->save();

            return redirect()->back()->withFlashSuccess('User Berhasil Ditambah ! ✅');
        }

        if (request()->metode == 'edit') {
            $edit = Pusat::find(request()->id);
            $edit->name       = request()->nama;
            $edit->email      = request()->email;
            $edit->nohp       = request()->nohp;
            $edit->jabatan    = request()->jabatan;
            $edit->kode_user  = request()->kodeuser;

            $edit->save();

            return redirect()->back()->withFlashSuccess('User Berhasil Diperbaruhi  ! ✅');
        }

        if (request()->metode == 'hapus') {
            $hapus = Pusat::find(request()->id);
            $hapus->delete();

            return redirect()->back()->withFlashSuccess('User Berhasil Dihapus ! ✅');
        }

        if (request()->metode == 'aktif') {
            $aktif = Pusat::find(request()->id);
            $aktif->status     = 2;
            $aktif->save();

            return redirect()->back()->withFlashSuccess('User Berhasil Diaktifkan ! ✅');
        }

        if (request()->metode == 'nonaktif') {
            $nonaktif = Pusat::find(request()->id);
            $nonaktif->status   = 1;
            $nonaktif->save();

            return redirect()->back()->withFlashSuccess('User Berhasil Dinonaktifkan ! ✅');
        }

        if (request()->metode == 'password') {
            $password = Pusat::find(request()->id);
            $password->password   = Hash::make(request()->password);
            $password->save();

            return redirect()->back()->withFlashSuccess('Password User Berhasil Diupdate ! ✅');
        }

        $datajabatan = UserJabatanPusat::get();

        $datas = Pusat::when(request()->jabatan, function ($query) {
                    if (request()->jabatan != 'SEMUA') {
                        return $query->where('jabatan', request()->jabatan);
                    }
                })
                ->when(request()->cari, function ($query) {
                    return $query->where('name', 'like', '%'.request()->cari.'%')
                                ->orWhere('email', 'like', '%'.request()->cari.'%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10);

        return view('backend.konfigurasi.user-pusat', compact('datas', 'datajabatan'));
    }

    public function getUserCabang()
    {
        if (request()->metode == 'tambah') {
            $tambah             = new Cabang;
            $tambah->name       = request()->nama;
            $tambah->email      = request()->email;
            $tambah->password   = Hash::make(request()->password);
            $tambah->dealer     = request()->dealer;
            $tambah->status     = 2;
            $tambah->save();

            return redirect()->back()->withFlashSuccess('User Berhasil Ditambah ! ✅');
        }

        if (request()->metode == 'edit') {
            $edit             = Cabang::find(request()->id);
            $edit->name       = request()->nama;
            $edit->email      = request()->email;
            $edit->nohp       = request()->nohp;
            $edit->dealer     = request()->dealer;
            $edit->kode_user  = request()->kodeuser;

            $edit->save();

            return redirect()->back()->withFlashSuccess('User Berhasil Diperbaruhi  ! ✅');
        }

        if (request()->metode == 'hapus') {
            $hapus = Cabang::find(request()->id);
            $hapus->delete();

            return redirect()->back()->withFlashSuccess('User Berhasil Dihapus ! ✅');
        }

        if (request()->metode == 'aktif') {
            $aktif = Cabang::find(request()->id);
            $aktif->status     = 2;
            $aktif->save();

            return redirect()->back()->withFlashSuccess('User Berhasil Diaktifkan ! ✅');
        }

        if (request()->metode == 'nonaktif') {
            $nonaktif = Cabang::find(request()->id);
            $nonaktif->status   = 1;
            $nonaktif->save();

            return redirect()->back()->withFlashSuccess('User Berhasil Dinonaktifkan ! ✅');
        }

        if (request()->metode == 'password') {
            $password = Cabang::find(request()->id);
            $password->password   = Hash::make(request()->password);
            $password->save();

            return redirect()->back()->withFlashSuccess('Password User Berhasil Diupdate ! ✅');
        }

        $datadealer = Dealer::get();

        $datas = Cabang::when(request()->dealer, function ($query) {
                    if (request()->dealer != 'SEMUA') {
                        return $query->where('dealer', request()->dealer);
                    }
                })
                ->when(request()->cari, function ($query) {
                    return $query->where('name', 'like', '%'.request()->cari.'%')
                                ->orWhere('email', 'like', '%'.request()->cari.'%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10);

        return view('backend.konfigurasi.user-cabang', compact('datas', 'datadealer'));
    }

    public function getDisplay()
    {
        if (request()->metode == 'tambah') {
            $tambah = new Display;
            $tambah->nama_display = request()->nama;
            $tambah->unit_display = Str::upper(request()->unit);
            $tambah->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Ditambah ! ✅');
        }

        if (request()->metode == 'edit') {
            $edit = Display::find(request()->id);
            $edit->nama_display = request()->nama;
            $edit->unit_display = Str::upper(request()->unit);
            $edit->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Diperbaruhi  ! ✅');
        }

        if (request()->metode == 'hapus') {
            $hapus = Display::find(request()->id);
            $hapus->delete();

            return redirect()->back()->withFlashSuccess('Data Berhasil Dihapus ! ✅');
        }

        $dataunit = Display::select('unit_display')->groupBy('unit_display')->get();

        $datas = Display::when(request()->unit, function ($query) {
                            if (request()->unit != 'SEMUA') {
                                return $query->where('unit_display', request()->unit);
                            }
                        })
                        ->when(request()->cari, function ($query) {
                            return $query->where('nama_display', 'like', '%'.request()->cari.'%');
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('backend.konfigurasi.display', compact('datas', 'dataunit'));
    }

    public function getFinanceCompany()
    {
        if (request()->metode == 'tambah') {
            $tambah = new FinanceCompany;
            $tambah->nama = request()->nama;
            $tambah->kode = Str::upper(request()->kode);
            $tambah->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Ditambah ! ✅');
        }

        if (request()->metode == 'edit') {
            $edit = FinanceCompany::find(request()->id);
            $edit->nama = request()->nama;
            $edit->kode = Str::upper(request()->kode);
            $edit->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Diperbaruhi  ! ✅');
        }

        if (request()->metode == 'hapus') {
            $hapus = FinanceCompany::find(request()->id);
            $hapus->delete();

            return redirect()->back()->withFlashSuccess('Data Berhasil Dihapus ! ✅');
        }

        $datas = FinanceCompany::when(request()->cari, function ($query) {
                            return $query->where('nama', 'like', '%'.request()->cari.'%');
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('backend.konfigurasi.finance-company', compact('datas'));
    }

    public function getLokasi()
    {
        if (request()->metode == 'tambah') {
            $tambah = new Lokasi;
            $tambah->kota_lokasi = Str::upper(request()->kota);
            $tambah->kecamatan_lokasi = request()->kecamatan;
            $tambah->kelurahan_lokasi = request()->kelurahan;
            $tambah->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Ditambah ! ✅');
        }

        if (request()->metode == 'edit') {
            $edit = Lokasi::find(request()->id);
            $edit->kota_lokasi = Str::upper(request()->kota);
            $edit->kecamatan_lokasi = request()->kecamatan;
            $edit->kelurahan_lokasi = request()->kelurahan;
            $edit->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Diperbaruhi  ! ✅');
        }

        if (request()->metode == 'hapus') {
            $hapus = Lokasi::find(request()->id);
            $hapus->delete();

            return redirect()->back()->withFlashSuccess('Data Berhasil Dihapus ! ✅');
        }

        $datakota = Lokasi::select('kota_lokasi')->groupBy('kota_lokasi')->get();
        $datakecamatan = Lokasi::select('kecamatan_lokasi')->groupBy('kecamatan_lokasi')->get();

        $datas = Lokasi::when(request()->kota, function ($query) {
                            if (request()->kota != 'SEMUA') {
                                return $query->where('kota_lokasi', request()->kota);
                            }
                        })
                        ->when(request()->kecamatan, function ($query) {
                            if (request()->kecamatan != 'SEMUA') {
                                return $query->where('kecamatan_lokasi', request()->kecamatan);
                            }
                        })
                        ->when(request()->cari, function ($query) {
                            return $query->where('kota_lokasi', 'like', '%'.request()->cari.'%')
                                        ->orWhere('kecamatan_lokasi', 'like', '%'.request()->cari.'%')
                                        ->orWhere('kelurahan_lokasi', 'like', '%'.request()->cari.'%');
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('backend.konfigurasi.lokasi', compact('datas', 'datakota', 'datakecamatan'));
    }

    public function getKategori()
    {
        if (request()->metode == 'tambah') {
            $tambah = new KategoriProposal;
            $tambah->nama_kategori = request()->nama;
            $tambah->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Ditambah ! ✅');
        }

        if (request()->metode == 'edit') {
            $edit = KategoriProposal::find(request()->id);
            $edit->nama_kategori = request()->nama;
            $edit->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Diperbaruhi  ! ✅');
        }

        if (request()->metode == 'urutan') {
            $urutan = KategoriProposal::find(request()->id);
            $urutan->keterangan_kategori = request()->urutan;
            $urutan->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Diperbaruhi  ! ✅');
        }

        if (request()->metode == 'hapus') {
            $hapus = KategoriProposal::find(request()->id);
            $hapus->delete();

            return redirect()->back()->withFlashSuccess('Data Berhasil Dihapus ! ✅');
        }

        $datas = KategoriProposal::orderBy('keterangan_kategori', 'asc')->paginate(10);

        return view('backend.konfigurasi.kategori', compact('datas'));
    }

    public function getKaryawan()
    {
        if (request()->metode == 'tambah') {
            $tambah                       = new Karyawan;
            $tambah->nama_karyawan        = request()->nama;
            $tambah->nohp_karyawan        = request()->nohp;
            $tambah->honda_id_karyawan    = request()->hondaid;
            $tambah->hso_id_karyawan      = request()->hsoid;
            $tambah->dealer_karyawan      = request()->dealer;
            $tambah->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Ditambah ! ✅');
        }

        if (request()->metode == 'edit') {
            $edit                       = Karyawan::find(request()->id);
            $edit->nama_karyawan        = request()->nama;
            $edit->nohp_karyawan        = request()->nohp;
            $edit->honda_id_karyawan    = request()->hondaid;
            $edit->hso_id_karyawan      = request()->hsoid;
            $edit->dealer_karyawan      = request()->dealer;
            $edit->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Diperbaruhi  ! ✅');
        }

        if (request()->metode == 'hapus') {
            $hapus = Karyawan::find(request()->id);
            $hapus->delete();

            return redirect()->back()->withFlashSuccess('Data Berhasil Dihapus ! ✅');
        }

        $datadealer = Dealer::get();

        $datas = Karyawan::when(request()->dealer, function ($query) {
                            if (request()->dealer != 'SEMUA') {
                                return $query->where('dealer_karyawan', request()->dealer);
                            }
                        })
                        ->when(request()->cari, function ($query) {
                            return $query->where('nama_karyawan', 'like', '%'.request()->cari.'%')
                                        ->orWhere('honda_id_karyawan', 'like', '%'.request()->cari.'%')
                                        ->orWhere('hso_id_karyawan', 'like', '%'.request()->cari.'%')
                            ;
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('backend.konfigurasi.karyawan', compact('datas', 'datadealer'));
    }

    public function getSalesPeople()
    {
        if (request()->metode == 'tambah') {
            $tambah                       = new SalesPeople;
            $tambah->nama_sales_people        = request()->nama;
            $tambah->nohp_sales_people        = request()->nohp;
            $tambah->honda_id_sales_people    = request()->hondaid;
            $tambah->hso_id_sales_people      = request()->hsoid;
            $tambah->dealer_sales_people      = request()->dealer;
            $tambah->jabatan_sales_people     = request()->jabatan;
            $tambah->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Ditambah ! ✅');
        }

        if (request()->metode == 'edit') {
            $edit                       = SalesPeople::find(request()->id);
            $edit->nama_sales_people        = request()->nama;
            $edit->nohp_sales_people        = request()->nohp;
            $edit->honda_id_sales_people    = request()->hondaid;
            $edit->hso_id_sales_people      = request()->hsoid;
            $edit->jabatan_sales_people     = request()->jabatan;
            $edit->dealer_sales_people      = request()->dealer;
            $edit->save();

            return redirect()->back()->withFlashSuccess('Data Berhasil Diperbaruhi  ! ✅');
        }

        if (request()->metode == 'hapus') {
            $hapus = SalesPeople::find(request()->id);
            $hapus->delete();

            return redirect()->back()->withFlashSuccess('Data Berhasil Dihapus ! ✅');
        }

        $datadealer = Dealer::get();

        $datas = SalesPeople::when(request()->dealer, function ($query) {
                            if (request()->dealer != 'SEMUA') {
                                return $query->where('dealer_sales_people', request()->dealer);
                            }
                        })
                        ->when(request()->cari, function ($query) {
                            return $query->where('nama_sales_people', 'like', '%'.request()->cari.'%')
                                        ->orWhere('honda_id_sales_people', 'like', '%'.request()->cari.'%')
                                        ->orWhere('hso_id_sales_people', 'like', '%'.request()->cari.'%')
                            ;
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('backend.konfigurasi.sales-people', compact('datas', 'datadealer'));
    }
}
