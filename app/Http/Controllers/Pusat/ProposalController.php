<?php

namespace App\Http\Controllers\Pusat;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\Display;
use App\Models\KategoriProposal;
use App\Models\Proposal;
use App\Models\Lokasi;
use App\Models\SalesPeople;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Image;
use App\Models\ApprovalProposal;

class ProposalController extends Controller
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
    // public function index() {
    //     $datas = Proposal::where('status_proposal', Auth::guard('pusat')->user()->dealer)
    //             ->orderBy('updated_at', 'DESC')
    //             ->paginate()
    //             ;
    //     return view('pusat.proposal.index', compact('datas'));
    // }

    public function index()
    {
        if(request()->metode == 'hapus') {
            $hapus = Proposal::find(request()->id);
            $hapus->delete();
            return redirect()->back()->withFlashSuccess('Proposal Berhasil Terhapus  ! ✅');
        }

        $datalokasi   = Lokasi::get();
        $datakategori = KategoriProposal::get();
        $datadealer   = Dealer::get();
        $datas        = Proposal::orderBy('updated_at', 'DESC')
                            ->pj(request()->namapj)
                            ->kategori(request()->kategori)
                            ->lokasi(request()->lokasi)
                            ->statusProposal(request()->status)
                            ->tanggal(request()->tanggal)
                            ->cariDealer(request()->dealer)
                            ->where('status_proposal', '!=', 1)
                            ->paginate(10);
        return view('pusat.proposal.index', compact('datas', 'datalokasi', 'datakategori', 'datadealer'));
    }

    public function postStatusHistory()
    {
        $proposal  = Proposal::find(request()->id);
        if (request()->status == 1) { // approve
            if (Auth::guard('pusat')->user()->jabatan == 5){
                $proposal->status_proposal = 4;
            } else {
                $proposal->status_proposal = 3;
            }
        } elseif (request()->status == 2) { // revise
            $proposal->status_proposal = 5;
        } elseif (request()->status == 3) { // rejected
            $proposal->status_proposal = 6;
        }



        $proposal->save();

        $approval                         = new ApprovalProposal;
        $approval->id_proposal            = request()->id;
        $approval->user_approval          = Auth::guard('pusat')->user()->id;
        $approval->status_approval        = request()->status;
        $approval->keterangan_approval    = request()->keterangan;

        $approval->save();

        return redirect()->route('pusat.proposal.index')->withFlashSuccess('Update Approval Proposal Berhasil ! ✅');
    }

    public function getTes()
    {
        return view('pusat.proposal.tes');
    }

    public function getDataLokasi()
    {
        $datalokasi = [];

        if(request()->q){
            $datalokasi  = Lokasi::select("kota_lokasi", "kecamatan_lokasi", "kelurahan_lokasi")
                    ->whereRaw('LOWER(kota_lokasi) LIKE ? ', '%' . strtolower(request()->q) . '%')
                    ->orWhereRaw('LOWER(kecamatan_lokasi) LIKE ? ', '%' . strtolower(request()->q) . '%')
                    ->orWhereRaw('LOWER(kota_lokasi) LIKE ? ', '%' . strtolower(request()->q) . '%')
            		->get();
        }
        return response()->json($datalokasi);
    }

    public function getUpload()
    {
        if (!null == request()->uuid) {
            return view('pusat.proposal.upload');
        } else {
            return redirect()->route('pusat.pameran.index');
        }

    }

    public function getPilihJenisProposal()
    {
        $datas = KategoriProposal::get();
        return view('pusat.proposal.jenis', compact('datas'));
    }

    public function postPilihJenisProposalBuat()
    {
        if (request()->metode == 'buat') {
            $buat                     = new Proposal;
            $buat->uuid               = Str::uuid();
            $buat->user_proposal      = Auth::guard('pusat')->user()->id;
            $buat->kategori_proposal  = request()->kategori;
            $buat->status_proposal    = 1;

            $buat->save();

            return redirect()->to(route('pusat.proposal.getCreate').'?id='.$buat->uuid);
        } else {
            return redirect()->route('pusat.proposal.index');
        }

    }

    public function getCreate()
    {
        // if (request()->id == null) {
        //     return redirect()->route('pusat.proposal.index');
        // }

        $datalokasi         = Lokasi::get();
        $datadisplay        = Display::get();
        $datadealer         = Dealer::get();
        $salespeople        = SalesPeople::get();
        $data               = Proposal::where('uuid', request()->id)->first();
        $datadana           = json_decode($data->dana_proposal  ?? null, true);
        $datasalespeople    = json_decode($data->sales_people_proposal  ?? null, true);

        // if (null == $data) {
        //     return redirect()->route('pusat.proposal.index');
        // }

        return view('pusat.proposal.create', compact('data', 'datalokasi', 'datadisplay', 'datadealer', 'salespeople', 'datadana', 'datasalespeople'));
    }

    public function getShow()
    {
        // dd(request()->id);
        if (!null == request()->id) {

            $datalokasi         = Lokasi::get();
            $datadisplay        = Display::get();
            $datadealer         = Dealer::get();
            $salespeople        = SalesPeople::get();
            $data               = Proposal::where('uuid', request()->id)->first();
            $datadana           = json_decode($data->dana_proposal  ?? null, true);
            $datasalespeople    = json_decode($data->sales_people_proposal  ?? null, true);

            // if (null == $data || $data->status_proposal == 1) {
            //     return redirect()->route('pusat.proposal.index');
            // }

            $dataapproval = ApprovalProposal::where('id_proposal', $data->id)->get();


            return view('pusat.proposal.show', compact('data', 'datalokasi', 'datadisplay', 'datadealer', 'salespeople', 'datadana', 'datasalespeople', 'dataapproval'));
        } else {
            return redirect()->route('pusat.proposal.index');
        }
    }

    public function postStore()
    {
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

        $dt = Carbon::now();
        $no = Proposal::whereYear('created_at', $dt->year)->where('status_proposal', !null)->count();

        if (request()->b == 'upload' || request()->b == 'draft' || request()->b == 'hapusfoto') {
            $st = 'draft';
        } elseif (request()->b == 'done') {
            $st = 'done';
        } else {
            $st = 'draft';
        }

        $data                                   = Proposal::firstWhere('uuid', request()->uuid);
        $data->no_proposal                      = $st == 'draft' ? null : $no.'/'.$dt->year.'/'.$dt->month.'/'.$dt->day.'/'.$data->kategori_proposal.'/'.$data->dealer->kode_dealer ;
        $data->status_proposal                  = $st == 'done' ? 2 : 1;
        $data->lokasi_proposal                  = request()->lokasi ?? null ;
        $data->dealer_proposal                  = request()->dealer ?? null;
        $data->display_proposal                 = cekarray(request()->display) ?? null ;
        $data->target_database_proposal         = request()->targetdata ?? null ;
        $data->target_penjualan_proposal        = request()->targetjual ?? null ;
        $data->target_prospectus_proposal       = request()->targetpros ?? null ;
        $data->periode_start_proposal           = request()->tanggalstart ?? null ;
        $data->periode_end_proposal             = request()->tanggalend ?? null ;
        $data->program_proposal                 = request()->program ?? null ;
        $data->tempat_proposal                  = request()->tempat ?? null ;
        $data->lat_proposal                     = request()->lat ?? null ;
        $data->long_proposal                    = request()->long ?? null ;
        $data->dana_proposal                    = cekarray($dana) ?? null ;
        $data->penanggung_jawab_proposal        = request()->pjid ?? null ;
        $data->sales_people_proposal            = cekarray(request()->idsales) ?? null ;
        $data->history_penjualan_proposal       = request()->historypenjualan ?? null ;
        $data->latar_belakang_proposal          = request()->latarbelakang ?? null ;
        $data->latar_kompetitor_proposal        = request()->latarkompetitor ?? null ;
        $data->kondisi_penjualan_m_1_proposal   = request()->mmin1 ?? null ;
        $data->kondisi_penjualan_m1_proposal    = request()->m1 ?? null ;
        $data->tujuan_proposal                  = request()->tujuan ?? null ;
        // $data->fotolokasi_proposal              = cekarray(request()->fotolokasi) ?? null ;
        $data->total_dana_proposal              = str_replace(",","",request()->total) ?? null ;
        $data->save();

        if (request()->b == 'upload') {
            return redirect()->to(route('pusat.proposal.getUpload').'?uuid='.request()->uuid);
        } elseif (request()->b == 'done' || request()->b == 'draft') {
            return redirect()->route('pusat.proposal.index')->withFlashSuccess('Data Proposal Tersimpan  ! ✅');
        } else {
            $d    = json_decode($data->foto_lokasi_proposal);
            foreach ($d as $foto_) {
                if ($foto_  != request()->b) {
                    $foto[] = $foto_ ;
                }
            }
            $data->foto_lokasi_proposal = !empty($foto) ? json_encode($foto) : null;
            $data->save();
            return redirect()->back()->withFlashSuccess('Foto Berhasil Terhapus  ! ✅');
        }

    }

    public function postUploadFoto()
    {
        request()->validate([
            'filepond' => 'required|image|max:10240',
        ]);
        $file_foto      = request()->file('filepond');

        $data       = Proposal::firstWhere('uuid', request()->uuid);
        $namafoto   = $data->id.'-'.substr($data->uuid,0,8);
        $n          = '-'.Str::random(5).'.';
        $datafoto   = $namafoto.$n.$file_foto->getClientOriginalExtension();

        if (!null == $data->foto_lokasi_proposal) {
            $d = json_decode($data->foto_lokasi_proposal);
            foreach ($d as $foto_) {
                $foto[] = $foto_;
            }
            $foto[] = $datafoto;
        } else {
            $foto[] = $datafoto;
        }


        $fotoproposal   = Image::make($file_foto);
        // if ($this->cekeventaktifinvoice) {
        //     $lokasiupload   = public_path('../../../public_html/'.$this->cekeventaktifinvoice->produk->domain.'/app/app/public/bukti-transfer/');
        // } else {
            $lokasiupload   = public_path('/upload-foto/');
        // }
        $fotoproposal->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $fotoproposal->save($lokasiupload.$datafoto);

        $data->foto_lokasi_proposal = json_encode($foto);
        $data->save();
    }
}
