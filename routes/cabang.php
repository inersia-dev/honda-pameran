<?php

use Illuminate\Support\Facades\Route;

// Dashboard
// Route::get('/', 'HomeController@index')->name('home');

// // Login
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Register
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// // Reset Password
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// // Confirm Password
// Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
// Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// // Verify Email
// // Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// // Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// // Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// Route::auto('/pameran', App\Http\Controllers\Cabang\PameranController::class);
// Route::auto('/proposal', App\Http\Controllers\Cabang\ProposalController::class);
// Route::auto('/lpj', App\Http\Controllers\Cabang\LpjController::class);

$dealerRoutes = function() {
    Route::get('/', 'App\Http\Controllers\Cabang\HomeController@index')->name('home');

     // Login
    Route::get('login', 'App\Http\Controllers\Cabang\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'App\Http\Controllers\Cabang\Auth\LoginController@login');
    Route::post('logout', 'App\Http\Controllers\Cabang\Auth\LoginController@logout')->name('logout');

    // Register
    Route::get('register', 'App\Http\Controllers\Cabang\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'App\Http\Controllers\Cabang\Auth\RegisterController@register');

    // Reset Password
    Route::get('password/reset', 'App\Http\Controllers\Cabang\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'App\Http\Controllers\Cabang\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'App\Http\Controllers\Cabang\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'App\Http\Controllers\Cabang\Auth\ResetPasswordController@reset')->name('password.update');

    // Confirm Password
    Route::get('password/confirm', 'App\Http\Controllers\Cabang\Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('password/confirm', 'App\Http\Controllers\Cabang\Auth\ConfirmPasswordController@confirm');

    Route::auto('/pameran', App\Http\Controllers\Cabang\PameranController::class);
    Route::auto('/proposal', App\Http\Controllers\Cabang\ProposalController::class);
    Route::auto('/lpj', App\Http\Controllers\Cabang\LpjController::class);
};
