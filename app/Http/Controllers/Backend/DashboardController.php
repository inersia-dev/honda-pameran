<?php

namespace App\Http\Controllers\Backend;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.dashboard');
    }

    public function pameran()
    {
        return view('backend.pameran.index');
    }

    public function proposal()
    {
        return view('backend.pameran.index');
    }
}
