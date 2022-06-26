<?php

namespace App\Http\Controllers\Cabang;

use App\Http\Controllers\Controller;
use App\Models\Lpj;
use App\Models\LpjKonsumen;
use Response;
use App\Models\Lokasi;
use App\Models\SalesPeople;
use App\Models\FinanceCompany;
use Illuminate\Support\Str;
use App\Models\Proposal;

class LpjController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('cabang.auth:cabang');
    }

    public function index() {
        return view('cabang.lpj.index');
    }

    public function postStore() {
        return 'pl';
    }

    public function getStoreInit() {

        $proposal = Proposal::where('uuid', request()->id)->first();

        $cek = Lpj::where('id_proposal', $proposal->id)->first();

        if ($cek) {
            $init = Lpj::where('id_proposal', $proposal->id)->first();
        } else {
            $init              = new Lpj;
            $init->uuid        = Str::uuid();
            $init->id_proposal = $proposal->id;
            $init->save();
        }


        return redirect()->to(route('cabang.lpj.getCreate').'/?id='.$init->uuid);
    }

    public function getCreate() {
        $datalokasi         = Lokasi::get();
        $salespeople        = SalesPeople::get();
        $datafinance        = FinanceCompany::get();
        $data     = Lpj::where('uuid', request()->id)->first();
        $datadana = json_decode($data->proposal->dana_proposal  ?? null, true);
        return view('cabang.lpj.create', compact('datalokasi', 'salespeople', 'datafinance', 'data', 'datadana'));
    }

    public function getCreateKonsumen() {
        return view('cabang.lpj.konsumen');
    }

    public function postStoreKonsumen() {
        // $lpj =
        $tambah                     = new LpjKonsumen;
        $tambah->id_lpj             = 1;
        $tambah->nama               = request()->namakonsumen;
        $tambah->alamat             = request()->alamatkonsumen;
        $tambah->id_lokasi          = request()->kelurahankonsumen;
        $tambah->notelp             = request()->notelpkonsumen;
        $tambah->type               = request()->typekonsumen;
        $tambah->id_sales_people    = request()->spkonsumen;
        $tambah->cash_credit        = request()->jeniskonsumen;
        $tambah->finance_company    = request()->financekonsumen;
        $tambah->database           = request()->dbkonsumen ? true : false;
        $tambah->prospecting        = request()->proskonsumen ? true : false;
        $tambah->polling            = request()->polkonsumen ? true : false;
        $tambah->reject             = request()->rejkonsumen ? true : false;
        $tambah->ssu                = request()->ssukonsumen ? true : false;
        $tambah->save();

        return Response::json($tambah);
    }
}
