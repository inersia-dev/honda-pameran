<?php

namespace App\Http\Controllers\Pusat;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\Lokasi;
use App\Models\KategoriProposal;
use App\Models\Proposal;
use Illuminate\Support\Facades\DB;
use App\Models\LpjKonsumen;
use App\Models\FinanceCompany;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('pusat.auth:pusat');
    }

    /**
     * Show the Pusat dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $datadealer           = Dealer::cariKota(request()->lokasi)->get();
        $datalokasikota       = Lokasi::select('kota_lokasi')->groupBy('kota_lokasi')->get();
        $dataactivitykota     = Lokasi::select('kota_lokasi')->groupBy('kota_lokasi')->where('kota_lokasi', request()->lokasi)->get();
        $datakategori         = KategoriProposal::orderBy('keterangan_kategori')->get();
        $dataproposal         = Proposal::finalProposal();
        $leaderboardsales     = LpjKonsumen::select('id_sales_people', DB::raw('count(id_sales_people) as total_ssu'))
                                        ->where('hasil', 4)
                                        ->groupBy('id_sales_people')
                                        ->orderBy('total_ssu', 'desc')
                                        ->areaKota(request()->lokasi)
                                        ->dataDealer(request()->dealer)
                                        ->skip(0)
                                        ->take(20)
                                        ->get();
        $datakonsumen          = LpjKonsumen::areaKota(request()->lokasi)
                                            ->dataDealer(request()->dealer);
                                        // ->get();
        $datafincoy            = FinanceCompany::get();

        if (request()->lokasi) { $datalokasikecamatan = Lokasi::where('kota_lokasi', request()->lokasi)->select('kecamatan_lokasi')->groupBy('kecamatan_lokasi')->get(); }
        else { $datalokasikecamatan = null; }

        if (request()->kecamatan) { $datalokasikelurahan = Lokasi::where('kota_lokasi', request()->lokasi)->where('kecamatan_lokasi', request()->kecamatan)->get(); }
        else { $datalokasikelurahan = null; }

        // LEADERBOARD LPJ Penjualan
        foreach ($datadealer as $dealer_pen) {
            $penjualan_ = 0;
            foreach ($dealer_pen->proposal as $a) {
                $penjualan_ = $penjualan_ + $a->lpj->sum('target_penjualan_lpj');
            }

            $data[] = array(
                'dealer_'    => $dealer_pen->nama_dealer,
                'penjualan_' => $penjualan_
            );
        }
        $data_leaderboard_penjualan_dealer = collect($data)->sortBy('penjualan_')->reverse()->toArray();


        // DATA STATISTIK KONSUMEN
        for ($k = 1; $k <= 2; $k++) {
            $konsumengender_[]          = LpjKonsumen::areaKota(request()->lokasi)->dataDealer(request()->dealer)->dataGender($k)->count() ;
        }
        for ($k = 1; $k <= 5; $k++) {
            $konsumenhasil_[]           = LpjKonsumen::areaKota(request()->lokasi)->dataDealer(request()->dealer)->dataHasil($k)->count() ;
        }
        for ($k = 1; $k <= 11; $k++) {
            $konsumendp_[]              = LpjKonsumen::areaKota(request()->lokasi)->dataDealer(request()->dealer)->dataDp($k)->count() ;
        }
        for ($k = 1; $k <= 11; $k++) {
            $konsumenpengeluaran_[]     = LpjKonsumen::areaKota(request()->lokasi)->dataDealer(request()->dealer)->dataPengeluaran($k)->count() ;
        }
        for ($k = 1; $k <= 24; $k++) {
            $konsumenpekerjaan_[]       = LpjKonsumen::areaKota(request()->lokasi)->dataDealer(request()->dealer)->dataPekerjaan($k)->count() ;
        }
        foreach ($datafincoy as $fincoy){
            $konsumenfincoy_[]          = LpjKonsumen::areaKota(request()->lokasi)->dataDealer(request()->dealer)->dataFincoy($fincoy->id)->count();
        }
        $statistik = [
            "konsumen_gender"       => $konsumengender_,
            "konsumen_hasil"        => $konsumenhasil_,
            "konsumen_dp"           => $konsumendp_,
            "konsumen_pengeluaran"  => $konsumenpengeluaran_,
            "konsumen_pekerjaan"    => $konsumenpekerjaan_,
            "konsumen_fincoy"       => $konsumenfincoy_,
        ];
        // dd(data_get($statistik, 'konsumen_fincoy'));


        return view('pusat.dashboard',
                compact('datadealer', 'datalokasikota', 'dataactivitykota', 'datalokasikecamatan', 'datalokasikelurahan', 'datakategori', 'dataproposal', 'data_leaderboard_penjualan_dealer', 'datakonsumen', 'leaderboardsales', 'statistik', 'datafincoy'));
    }
}
