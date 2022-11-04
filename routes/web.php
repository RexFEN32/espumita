<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InternalOrderController;
use App\Http\Controllers\TempItemController;
use App\Http\Controllers\PaymentsController;
use App\Models\TempItem;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('login'));
});

// Route::group(['middleware' => ['auth']], function()
// {
//     Route::resource('dashboard', DashboardController::class);
// });

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth']], function()
{
    Route::resource('internal_orders', InternalOrderController::class);
    Route::resource('temp_items', TempItemController::class);
    Route::resource('cuentas_cobrar', PaymentsController::class);
    Route::get('tempitems/{id}', [TempItemController::class, 'create_item'])->name('tempitems.create_item');
    Route::post('internal_orders/capture', [InternalOrderController::class, 'capture'])->name('internal_orders.capture');
    Route::post('internal_orders/shipments', [InternalOrderController::class, 'shipment'])->name('internal_orders.shipment');
    Route::post('internal_orders/pay_conditions', [InternalOrderController::class, 'pay_conditions'])->name('internal_orders.pay_conditions');
    Route::get('payment/{id}', [InternalOrderController::class, 'payment'])->name('internal_orders.payment');
    Route::post('internal_orders/partida', [InternalOrderController::class, 'partida'])->name('internal_orders.partida');

});