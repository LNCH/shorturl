<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\LinkRedirectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Handle redirects for any links
Route::get('r/{code}', [LinkRedirectController::class, 'redirect'])->name('redirect');

Route::middleware(['auth'])->group(function () {

    Route::view('/', 'dashboard')->name('dashboard');

    Route::get('link/{link}/qr', [LinkController::class, 'qr'])->name('links.qr');
    Route::resource('links', LinkController::class);

});

require __DIR__.'/auth.php';
