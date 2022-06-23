<?php

namespace App\Http\Controllers\Pusat;

use App\Http\Controllers\Controller;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;

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
    public function index() {
        $datas = Proposal::where('status_proposal', Auth::guard('pusat')->user()->dealer)
                ->orderBy('updated_at', 'DESC')
                ->paginate()
                ;
        return view('pusat.proposal.index', compact('datas'));
    }
}
