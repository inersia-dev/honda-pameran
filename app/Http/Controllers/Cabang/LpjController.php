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
use App\Models\KategoriProposal;

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
        $datakategori = KategoriProposal::get();
        $datas = Lpj::whereHas('proposal', function (Builder $query) {
                    $query->where('dealer_proposal', Auth::guard('cabang')->user()->dealer);
                 })
                 ->pj(request()->namapj)
                 ->kategori(request()->kategori)
                 ->submitDate(request()->tanggal)
                 ->paginate(10);

        return view('cabang.lpj.index', compact('datas', 'datakategori'));
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
        $datakonsumen = LpjKonsumen::where('id_lpj', $data->id)->get();

        $proposal      = Proposal::find($data->id_proposal);
        $datadanapro   = json_decode($proposal->dana_proposal  ?? null, true);

        return view('cabang.lpj.create', compact('datalokasi', 'salespeople', 'datafinance', 'data', 'datadana', 'datadanapro', 'datakonsumen'));
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
            $konsumen->id_lpj             = $data->id;
            $konsumen->nama               = request()->namakonsumen;
            $konsumen->alamat             = request()->alamatkonsumen;
            $konsumen->id_lokasi          = request()->lokasikonsumen;
            $konsumen->notelp             = request()->notelpkonsumen;
            $konsumen->type               = request()->typekonsumen;
            // $konsumen->status             = request()->konsumen;
            $konsumen->id_sales_people    = request()->saleskonsumen;
            $konsumen->cash_credit        = request()->jeniskonsumen;
            $konsumen->finance_company    = request()->financekonsumen;
            $konsumen->database           = request()->dbkonsumen ? true : false;
            $konsumen->prospecting        = request()->proskonsumen ? true : false;
            $konsumen->polling            = request()->polkonsumen ? true : false;
            $konsumen->reject             = request()->rejkonsumen ? true : false;
            $konsumen->ssu                = request()->ssukonsumen ? true : false;
            $konsumen->save();

            return redirect()->back()->withFlashSuccess('Data Konsumen Berhasil Ditambahkan  ! ✅');
        }

        return redirect()->route('cabang.lpj.index')->withFlashSuccess('Data Berhasil Tersimpan  ! ✅');
    }

    public function getKonsumen() {

        $datalokasi   = Lokasi::get();
        $salespeople  = SalesPeople::where('dealer_sales_people', Auth::guard('cabang')->user()->dealer)->get();
        $datafinance  = FinanceCompany::get();
        $data         = LpjKonsumen::find(request()->id);

        return view('cabang.lpj.konsumen', compact('datalokasi', 'salespeople', 'datafinance', 'data'));
    }

    public function postUpdateKonsumen() {

        $update                     = LpjKonsumen::find(request()->id);
        $update->nama               = request()->namakonsumen;
        $update->alamat             = request()->alamatkonsumen;
        $update->id_lokasi          = request()->kelurahankonsumen;
        $update->notelp             = request()->notelpkonsumen;
        $update->type               = request()->typekonsumen;
        $update->id_sales_people    = request()->spkonsumen;
        $update->cash_credit        = request()->jeniskonsumen;
        $update->finance_company    = request()->financekonsumen;
        $update->database           = request()->dbkonsumen ? true : false;
        $update->prospecting        = request()->proskonsumen ? true : false;
        $update->polling            = request()->polkonsumen ? true : false;
        $update->reject             = request()->rejkonsumen ? true : false;
        $update->ssu                = request()->ssukonsumen ? true : false;
        $update->save();

        return redirect()->to(route('cabang.lpj.getCreate').'/?id='.request()->uuid)->withFlashSuccess('Data Konsumen Berhasil Ditambahkan  ! ✅');
    }
}
