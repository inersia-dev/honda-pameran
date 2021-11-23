<?php

namespace App\Http\Controllers\Frontend\User;

/**
 * Class PameranController.
 */
class PameranController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.user.pameran.index');
    }

    public function create()
    {
        return view('frontend.user.pameran.create');
    }
}
