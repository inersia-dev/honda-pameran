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
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

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
        $datas = Lpj::whereHas('proposal', function (Builder $query) {
                    $query->where('dealer_proposal', Auth::guard('cabang')->user()->dealer);
                 })->paginate(10);

        return view('cabang.lpj.index', compact('datas'));
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
            $init->status_lpj  = 1;
            $init->save();
        }


        return redirect()->to(route('cabang.lpj.getCreate').'/?id='.$init->uuid);
    }

    public function getCreate() {
        $datalokasi   = Lokasi::get();
        $salespeople  = SalesPeople::where('dealer_sales_people', Auth::guard('cabang')->user()->dealer)->get();
        $datafinance  = FinanceCompany::get();
        $data         = Lpj::where('uuid', request()->id)->first();
        $datadana     = json_decode($data->dana_lpj ?? null, true);
        return view('cabang.lpj.create', compact('datalokasi', 'salespeople', 'datafinance', 'data', 'datadana'));
    }

    public function postStore() {

        // foreach (request()->ket_dana as $key => $item) {
            $dokumentasi[] = [
                'canvasing_1'             => '',
                'canvasing_2'             => '',
                'capture_blast_wa_1'      => '',
                'capture_blast_wa_2'      => '',
                'posting_flyer_1'         => '',
                'posting_flyer_2'         => '',
                'interaksi_konsumen_1'    => '',
                'interaksi_konsumen_2'    => '',
                'unit_display_1'          => '',
                'unit_display_2'          => '',
                'live_season_1'           => '',
                'live_season_2'           => '',
            ];
        // }

        foreach (request()->ket_dana as $key => $item) {
            $dana[] = [
                'ket_dana'          => request()->ket_dana[$key],
                'beban_dealer_dana' => request()->beban_dealer_dana[$key],
                'beban_fincoy_dana' => request()->beban_fincoy_dana[$key],
                'beban_md_dana'     => request()->beban_md_dana[$key],
            ];
        }

        function cekarray($data) {
            if ($data == 'null' || $data == null) {
                return null;
            } else {
                return json_encode($data);
            }
        }

        if (request()->b == 'upload' || request()->b == 'draft' || request()->b == 'hapusfoto') {
            $st = 'draft';
        } elseif (request()->b == 'done') {
            $st = 'done';
        } else {
            $st = 'draft';
        }

        $data                               = Lpj::firstWhere('uuid', request()->uuid);
        $data->periode_start_lpj            = request()->tanggalstart ?? null ;
        $data->periode_end_lpj              = request()->tanggalend ?? null ;
        $data->lokasi_lpj                   = request()->lokasi ?? null ;
        $data->target_database_lpj          = request()->database ?? null ;
        $data->target_prospectus_lpj        = request()->prospectus ?? null ;
        $data->target_penjualan_lpj         = request()->penjualan ?? null ;
        $data->dana_lpj                     = cekarray($dana);
        $data->status_lpj                   = $st == 'done' ? 2 : 1;
        $data->dokumentasi_lpj              = cekarray($dokumentasi);
        $data->problem_identification_lpj   = request()->problem ?? null ;
        $data->corrective_action_lpj        = request()->corrective ?? null ;
        $data->save();

        if (request()->b == 'konsumen') {
            $konsumen = new LpjKonsumen;
            $konsumen->id_lpj = $data->id;
            $konsumen->save();

            return redirect()->back()->withFlashSuccess('Data Konsumen Berhasil Ditambahkan  ! ✅');
        }

        return redirect()->route('cabang.lpj.index')->withFlashSuccess('Data Berhasil Tersimpan  ! ✅');
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
