<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

require_once 'cabang.php';
// Route::group(['as' => 'cabang.', 'domain' => 'dealer-honda.test'], $dealerRoutes);
Route::group(['as' => 'cabang.', 'domain' => 'dealer.hondakaltimra.com'], $dealerRoutes);


require_once 'pusat.php';
// Route::group(['as' => 'pusat.', 'domain' => 'main-dealer-honda.test'], $maindealerRoutes);
Route::group(['as' => 'pusat.', 'domain' => 'main-dealer.hondakaltimra.com'], $maindealerRoutes);

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});

Route::auto('/admin/konfigurasi', App\Http\Controllers\Backend\KonfigurasiController::class, ['middleware' => 'admin']);
