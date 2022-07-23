<?php

namespace App\Http\Controllers\Pusat;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\Lokasi;
use App\Models\KategoriProposal;
use Illuminate\Support\Facades\DB;

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

        if (request()->lokasi) { $datalokasikecamatan = Lokasi::where('kota_lokasi', request()->lokasi)->select('kecamatan_lokasi')->groupBy('kecamatan_lokasi')->get(); }
        else { $datalokasikecamatan = null; }

        if (request()->kecamatan) { $datalokasikelurahan = Lokasi::where('kota_lokasi', request()->lokasi)->where('kecamatan_lokasi', request()->kecamatan)->get(); }
        else { $datalokasikelurahan = null; }

        // $chart1 = Proposal::

        return view('pusat.dashboard', compact('datadealer', 'datalokasikota', 'datalokasikecamatan', 'datalokasikelurahan', 'datakategori'));
    }
}
