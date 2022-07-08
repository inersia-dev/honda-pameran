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
use App\Models\Dealer;
use Illuminate\Http\Request;
use App\Models\Display;
use Intervention\Image\Facades\Image;
use App\Models\LpjDokumentasi;

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
            if ($init->status_lpj == 2) {
                return redirect()->to(route('cabang.lpj.getShow').'/?id='.$init->uuid);
            }
        } else {
            $init              = new Lpj;
            $init->uuid        = Str::uuid();
            $init->id_proposal = $proposal->id;
            $init->status_lpj  = 1;
            $init->save();
        }

        return redirect()->to(route('cabang.lpj.getCreateOne').'/?id='.$init->uuid);
    }

    public function getCreateOne(Request $request) {

        $kota           = Dealer::find(Auth::guard('cabang')->user()->dealer);
        $datalokasi     = Lokasi::where('kota_lokasi', 'LIKE', '%'.$kota->kota_dealer.'%')->get();
        $datafinance    = FinanceCompany::get();
        $data           = Lpj::where('uuid', request()->id)->first();

        if (request()->submit == 'draft' || request()->submit == 'submit') {
            if(request()->finance){
                foreach (request()->finance as $keyfin => $item_f) {
                        $finance = json_encode(request()->finance);
                    }
            } else {
                $finance = null;
            }

            $data->finance_lpj          = !null == $finance ? $finance : null;
            $data->tempat_lpj           = request()->tempat;
            $data->lokasi_lpj           = request()->lokasi;
            $data->periode_start_lpj    = request()->start;
            $data->periode_end_lpj      = request()->end;
            $data->save();

            if (request()->submit == 'draft') {
                return redirect()->route('cabang.lpj.index')->withFlashSuccess('Lpj Berhasil Tersimpan  ! ✅');
            } elseif (request()->submit == 'submit') {
                $request->validate([
                    'tempat' => 'required',
                    'lokasi' => 'required',
                    'start'  => 'required',
                    'end'    => 'required',
                ]);
                return redirect()->to(route('cabang.lpj.getCreateTwo').'?id='.$data->uuid);
            }
        }

        return view('cabang.lpj.1', compact('datalokasi', 'data', 'datafinance'));
    }

    public function getCreateTwo(Request $request) {

        $data           = Lpj::where('uuid', request()->id)->first();

        if (request()->submit == 'draft' || request()->submit == 'submit') {

            $data->target_database_lpj    = request()->database;
            $data->target_penjualan_lpj   = request()->penjualan;
            $data->target_prospectus_lpj  = request()->prospectus;
            $data->target_downloader_lpj  = request()->downloader;
            $data->total_dana_lpj         = request()->totaldana;
            $data->save();

            if (request()->submit == 'draft') {
                return redirect()->route('cabang.lpj.index')->withFlashSuccess('Lpj Berhasil Tersimpan  ! ✅');
            } elseif (request()->submit == 'submit') {
                $request->validate([
                    'database'  => 'required',
                    'penjualan' => 'required',
                    'prospectus'=> 'required',
                    'downloader'=> 'required',
                    'totaldana' => 'required',
                ]);
                return redirect()->to(route('cabang.lpj.getCreateThree').'?id='.$data->uuid);
            }
        }

        return view('cabang.lpj.2', compact('data'));
    }

    public function getCreateThree(Request $request) {

        $data           = Lpj::where('uuid', request()->id)->first();

        if (request()->submit == 'draft' || request()->submit == 'submit') {

            $data->problem_identification_lpj    = request()->problem;
            $data->corrective_action_lpj   = request()->corrective;
            $data->save();

            if (request()->submit == 'draft') {
                return redirect()->route('cabang.lpj.index')->withFlashSuccess('Lpj Berhasil Tersimpan  ! ✅');
            } elseif (request()->submit == 'submit') {
                $request->validate([
                    'problem'  => 'required',
                    'corrective'  => 'required',
                ]);
                return redirect()->to(route('cabang.lpj.getCreateFour').'?id='.$data->uuid);
            }
        }

        return view('cabang.lpj.3', compact('data'));
    }

    public function getCreateFour(Request $request) {

        $data            = Lpj::where('uuid', request()->id)->first();
        if (request()->submit == 'draft' || request()->submit == 'submit') {
            if (request()->submit == 'draft') {
                return redirect()->route('cabang.lpj.index')->withFlashSuccess('Lpj Berhasil Tersimpan  ! ✅');
            } elseif (request()->submit == 'submit') {
                $cek1 = LpjDokumentasi::where('id_lpj', $data->id)->where('kode', 1)->count();
                $cek2 = LpjDokumentasi::where('id_lpj', $data->id)->where('kode', 2)->count();
                $cek3 = LpjDokumentasi::where('id_lpj', $data->id)->where('kode', 3)->count();
                $cek4 = LpjDokumentasi::where('id_lpj', $data->id)->where('kode', 4)->count();
                $cek5 = LpjDokumentasi::where('id_lpj', $data->id)->where('kode', 5)->count();
                $cek6 = LpjDokumentasi::where('id_lpj', $data->id)->where('kode', 6)->count();
                if($cek1 < 2){ return redirect()->back()->withFlashDanger('Foto Kanvasing Sebelum kegiatan Kurang/Belum Diupload !');}
                elseif($cek2 < 2){ return redirect()->back()->withFlashDanger('Foto Capture Blast WA kepada konsumen Kurang/Belum Diupload !');}
                elseif($cek3 < 2){ return redirect()->back()->withFlashDanger('Foto Posting flyer kegiatan di media sosial dealer Kurang/Belum Diupload !');}
                elseif($cek4 < 2){ return redirect()->back()->withFlashDanger('Foto Interaksi konsumen Kurang/Belum Diupload !');}
                elseif($cek5 < 2){ return redirect()->back()->withFlashDanger('Foto Unit Display Kurang/Belum Diupload !');}
                elseif($cek6 < 2){ return redirect()->back()->withFlashDanger('Foto Live Season saat kegiatan berlangsung Kurang/Belum Diupload !');}
                else{return redirect()->to(route('cabang.lpj.getCreateFive').'?id='.$data->uuid);}
            }
        }

        return view('cabang.lpj.4', compact('data'));
    }

    public function getCreateFourUpload(Request $request) {

        $data           = Lpj::where('uuid', request()->id)->first();

        $datauploads = collect([
            ['id'   => '1','nama' => 'Kanvasing Sebelum kegiatan'],
            ['id'   => '2','nama' => 'Capture Blast WA kepada konsumen'],
            ['id'   => '3','nama' => 'Posting flyer kegiatan di media sosial dealer'],
            ['id'   => '4','nama' => 'Interaksi konsumen'],
            ['id'   => '5','nama' => 'Unit Display'],
            ['id'   => '6','nama' => 'Live Season saat kegiatan berlangsung'],
        ]);

        $dataupload = $datauploads->firstWhere('id', request()->upload);

        return view('cabang.lpj.4-upload', compact('data', 'dataupload'));
    }

    public function getCreateFourUploadHapus(Request $request) {

        $hapus = LpjDokumentasi::find(request()->id);
        $hapus->delete();

        return redirect()->back()->withFlashSuccess('Foto Berhasil Dihapus ! ✅');
    }

    public function getTess()
    {
        $a = Proposal::find(15);
        $b = json_decode($a->display_proposal);
        $b[] = ['oke' => 'tambah', 'okeeee' => '1'];
        return $b;
    }

    public function postCreateUpload(Request $request) {

        try {

            request()->validate([
                'filepond' => 'required|image|max:10240',
            ]);
            $file_foto      = request()->file('filepond');

            $data       = Lpj::firstWhere('uuid', request()->uuid);
            $namafoto   = $data->id.'-'.substr($data->uuid,0,8);
            $n          = '-'.Str::random(5).'.';
            $datafoto   = $namafoto.$n.$file_foto->getClientOriginalExtension();

            $tambah = new LpjDokumentasi;
            $tambah->id_lpj = $data->id;
            $tambah->kode   = request()->upload;
            $tambah->foto   = $datafoto;
            $tambah->save();

            // $foto   = json_decode($data->dokumentasi_lpj);
            // $foto[] = ['id' => request()->upload, 'foto' => $datafoto ];

            $fotolpj   = Image::make($file_foto);
            $lokasiupload   = public_path('/upload-foto-lpj/');
            $fotolpj->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $fotolpj->save($lokasiupload.$datafoto);

            // $data->dokumentasi_lpj = json_encode($foto);
            // $data->save();

            return response()->json(['info' => 'berhasil', 'data' => $tambah]);
        } catch (\Throwable $th) {
            return response()->json(['eror' => $th]);
        }

    }

    public function getCreateFive(Request $request) {

        $data           = Lpj::where('uuid', request()->id)->first();

        if (request()->method == 'konsumen') {
            $tambahkonsumen = new LpjKonsumen;
            $tambahkonsumen->id_lpj             = $data->id;
            $tambahkonsumen->nama               = $request->nama;
            $tambahkonsumen->alamat             = $request->alamat;
            $tambahkonsumen->lokasi             = $request->lokasi;
            $tambahkonsumen->tgl_lahir          = $request->tgllahir;
            $tambahkonsumen->gender             = $request->gender;
            $tambahkonsumen->notelp             = $request->notelp;
            $tambahkonsumen->pekerjaan          = $request->pekerjaan;
            $tambahkonsumen->nomor_mesin        = $request->nomormesin;
            $tambahkonsumen->unit               = $request->unit;
            $tambahkonsumen->id_lokasi          = $request->lokasi;
            $tambahkonsumen->id_sales_people    = $request->sales;
            $tambahkonsumen->finance_company    = $request->finance;
            $tambahkonsumen->cash_credit        = $request->jenis;
            $tambahkonsumen->hasil              = $request->hasil;
            $tambahkonsumen->pengeluaran        = $request->pengeluaran;
            $tambahkonsumen->dp                 = $request->dp;
            $tambahkonsumen->merkmotor          = $request->merkmotor;
            $tambahkonsumen->jenismotor         = $request->jenismotor;
            $tambahkonsumen->save();

            return redirect()->back()->withFlashSuccess('Konsumen Berhasil Ditambahkan  ! ✅');
        } elseif (request()->method == 'hapuskonsumen') {
            $hapuskonsumen = LpjKonsumen::find(request()->id);
            $hapuskonsumen->delete();
            return redirect()->back()->withFlashSuccess('Konsumen Berhasil Dihapus ! ✅');
        } elseif (request()->method == 'updatekonsumen') {
            $updatekonsumen = LpjKonsumen::find(request()->idkonsumen);
            $updatekonsumen->id_lpj             = $data->id;
            $updatekonsumen->nama               = $request->nama;
            $updatekonsumen->alamat             = $request->alamat;
            $updatekonsumen->lokasi             = $request->lokasi;
            $updatekonsumen->tgl_lahir          = $request->tgllahir;
            $updatekonsumen->gender             = $request->gender;
            $updatekonsumen->notelp             = $request->notelp;
            $updatekonsumen->pekerjaan          = $request->pekerjaan;
            $updatekonsumen->nomor_mesin        = $request->nomormesin;
            $updatekonsumen->unit               = $request->unit;
            $updatekonsumen->id_lokasi          = $request->lokasi;
            $updatekonsumen->id_sales_people    = $request->sales;
            $updatekonsumen->finance_company    = $request->finance;
            $updatekonsumen->cash_credit        = $request->jenis;
            $updatekonsumen->hasil              = $request->hasil;
            $updatekonsumen->pengeluaran        = $request->pengeluaran;
            $updatekonsumen->dp                 = $request->dp;
            $updatekonsumen->merkmotor          = $request->merkmotor;
            $updatekonsumen->jenismotor         = $request->jenismotor;
            $updatekonsumen->save();

            return redirect()->to(route('cabang.lpj.getCreateFive').'/?id='.request()->id)->withFlashSuccess('Konsumen Berhasil Ditambahkan  ! ✅');
        }

        $kota           = Dealer::find(Auth::guard('cabang')->user()->dealer);
        $datalokasi     = Lokasi::where('kota_lokasi', 'LIKE', '%'.$kota->kota_dealer.'%')->get();
        $salespeople    = SalesPeople::where('dealer_sales_people', Auth::guard('cabang')->user()->dealer)->get();
        $datafinance    = FinanceCompany::get();
        $datadana       = json_decode($data->dana_lpj ?? null, true);
        $datakonsumen   = LpjKonsumen::where('id_lpj', $data->id)->get();
        $datadisplay    = Display::get();
        $konsumen       = LpjKonsumen::find(request()->idkonsumen);

        if (request()->submit == 'draft') {
            return redirect()->route('cabang.lpj.index')->withFlashSuccess('Lpj Berhasil Tersimpan  ! ✅');
        } elseif (request()->submit == 'submit') {
            $cekkonsumen = LpjKonsumen::where('id_lpj', $data->id )->count();
            if($cekkonsumen < 1){return redirect()->back()->withFlashDanger('Tidak Ada data Konsumen !');}
            else{
                $data->status_lpj = 2;
                $data->save();

                return redirect()->to(route('cabang.lpj.index'));
            }
        }

        return view('cabang.lpj.5', compact('datalokasi', 'salespeople', 'datafinance', 'data', 'datadana', 'datakonsumen', 'datadisplay', 'konsumen'));
    }

    public function getShow(Request $request) {

        $data           = Lpj::where('uuid', request()->id)->first();

        $kota           = Dealer::find(Auth::guard('cabang')->user()->dealer);
        $datalokasi     = Lokasi::where('kota_lokasi', 'LIKE', '%'.$kota->kota_dealer.'%')->get();
        $salespeople    = SalesPeople::where('dealer_sales_people', Auth::guard('cabang')->user()->dealer)->get();
        $datafinance    = FinanceCompany::get();
        $datadana       = json_decode($data->dana_lpj ?? null, true);
        $datakonsumen   = LpjKonsumen::where('id_lpj', $data->id)->get();
        $datadisplay    = Display::get();
        $konsumen       = LpjKonsumen::find(request()->idkonsumen);

        if (request()->submit == 'draft') {
            return redirect()->route('cabang.lpj.index')->withFlashSuccess('Lpj Berhasil Tersimpan  ! ✅');
        } elseif (request()->submit == 'submit') {
            $cekkonsumen = LpjKonsumen::where('id_lpj', $data->id )->count();
            if($cekkonsumen < 1){return redirect()->back()->withFlashDanger('Tidak Ada data Konsumen !');}
            else{
                $data->status_lpj = 2;
                $data->save();

                return redirect()->to(route('cabang.lpj.index'));
            }
        }

        return view('cabang.lpj.show', compact('datalokasi', 'salespeople', 'datafinance', 'data', 'datadana', 'datakonsumen', 'datadisplay', 'konsumen'));
    }

    public function getCreate(Request $request) {

        $kota           = Dealer::find(Auth::guard('cabang')->user()->dealer);
        $datalokasi     = Lokasi::where('kota_lokasi', 'LIKE', '%'.$kota->kota_dealer.'%')->get();
        $salespeople    = SalesPeople::where('dealer_sales_people', Auth::guard('cabang')->user()->dealer)->get();
        $datafinance    = FinanceCompany::get();
        $data           = Lpj::where('uuid', request()->id)->first();
        $datadana       = json_decode($data->dana_lpj ?? null, true);
        $datakonsumen   = LpjKonsumen::where('id_lpj', $data->id)->get();


        return view('cabang.lpj.create', compact('datalokasi', 'salespeople', 'datafinance', 'data', 'datadana', 'datakonsumen'));
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
