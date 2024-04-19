<?php

use App\Http\Controllers\BoothController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\PaymentGatewaySettingController;
use App\Http\Controllers\PhotoTransactionController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketHistoryController;

use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\PembelianBarangController;


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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    /**
     * MAIN ROUTES
     */

    // /master-user
    Route::resource('master-user', MasterUserController::class);
    // /master-barang
    Route::resource('master-barang', MasterBarangController::class);
    Route::resource('pembelian-barang', PembelianBarangController::class);
    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    // /payment-gateway-settings
    Route::resource('payment-gateway-settings', PaymentGatewaySettingController::class);

    // /booths
    Route::resource('booths', BoothController::class);

    // /general-settings
    Route::resource('general-settings', GeneralSettingController::class);

    // /tickets
    Route::resource('tickets', TicketController::class);

    // /tickets
    Route::get('ticket-histories/{ticket_id}', [TicketController::class, 'history'])->name('tickets.history');

});

require __DIR__ . '/auth.php';
