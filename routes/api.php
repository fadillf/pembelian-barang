<?php

use App\Http\Controllers\Api\PhotoSessionEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\AppController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\GeneralSettingController;
use App\Models\PhotoSessionEvent;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1'], function(){
    // Route::resource('photo-transaction', TransactionController::class);
    Route::post('/photo-transaction', [TransactionController::class, 'generateChargePayment']);
    Route::post('/photo-transaction/check-status', [TransactionController::class, 'checkStatus']);
    Route::post('/photo-transaction/receive-webhook', [TransactionController::class, 'receiveWebhook']);
    Route::post('/photo-transaction/check-ticket', [TicketController::class, 'checkTicket']);

    // /photo-session-events/{bothApplicationKey}
    Route::get('/photo-session-events/{activation_code}/receive-webhook', [PhotoSessionEventController::class, 'receiveWebhook']);
    Route::get('/photo-session-events/{activation_code}/check-event', [PhotoSessionEventController::class, 'checkEvent']);

    // /app
    Route::post('/app/me', [AppController::class, 'me']);
    Route::post('/app/activate', [AppController::class, 'activate']);

    Route::post('/general-settings/store', [GeneralSettingController::class, 'store']);
});
