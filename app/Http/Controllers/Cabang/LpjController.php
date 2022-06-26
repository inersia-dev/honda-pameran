<?php

namespace App\Http\Controllers\Cabang;

use App\Http\Controllers\Controller;
use App\Models\Lpj;

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

    public function getCreate() {
        return view('cabang.lpj.create');
    }
}
