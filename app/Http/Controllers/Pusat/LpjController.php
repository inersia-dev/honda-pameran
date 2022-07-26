<?php

namespace App\Http\Controllers\Pusat;

use App\Http\Controllers\Controller;
use App\Models\Lpj;
use App\Models\LpjKonsumen;
use App\Models\FinanceCompany;
use App\Models\KategoriProposal;
use Illuminate\Http\Request;
use App\Models\Display;
use App\Models\Dealer;

class LpjController extends Controller
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

    public function index() {
        $datakategori = KategoriProposal::get();
        $datadealer   = Dealer::get();
        $datas = Lpj::where('status_lpj', 2)
                 ->dealer(request()->dealer)
                 ->kategori(request()->kategori)
                 ->submitDate(request()->tanggal)
                 ->paginate(10);

        return view('pusat.lpj.index', compact('datas', 'datakategori', 'datadealer'));
    }

    public function getShow(Request $request) {

        $data           = Lpj::where('uuid', request()->id)->first();

        $datafinance    = FinanceCompany::get();
        $datadana       = json_decode($data->dana_lpj ?? null, true);
        $datakonsumen   = LpjKonsumen::where('id_lpj', $data->id)->get();
        $datadisplay    = Display::get();

        return view('pusat.lpj.show', compact('datafinance', 'data', 'datadana', 'datakonsumen', 'datadisplay'));
    }
}
