<?php

namespace App\Http\Controllers\Pusat;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\Lokasi;
use App\Models\KategoriProposal;
use App\Models\Proposal;
use Illuminate\Support\Facades\DB;
use App\Models\LpjKonsumen;

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
        $datadealer       = Dealer::get();
        $datalokasikota   = Lokasi::select('kota_lokasi')->groupBy('kota_lokasi')->get();
        $datakategori     = KategoriProposal::orderBy('keterangan_kategori')->get();
        $dataproposal     = Proposal::finalProposal();
        $datakonsumen     = LpjKonsumen::select('id_sales_people', DB::raw('count(id_sales_people) as total_ssu'))
                                        ->where('hasil', 4)
                                        ->groupBy('id_sales_people')
                                        ->orderBy('total_ssu', 'desc')
                                        ->skip(0)
                                        ->take(20)
                                        ->get();

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

        return view('pusat.dashboard', compact('datadealer', 'datalokasikota', 'datalokasikecamatan', 'datalokasikelurahan', 'datakategori', 'dataproposal', 'data_leaderboard_penjualan_dealer', 'datakonsumen'));
    }
}
