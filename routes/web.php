<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ConfidencialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InternalOrderController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PeticionController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\TempItemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\encargadosController;
use App\Http\Controllers\notaJarceriaController;
use App\Http\Controllers\ClasificationController;
use App\Models\TempItem;
use App\Http\Controllers\Admin\CustomerContactController;
use App\Http\Controllers\Admin\CustomerController;
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
    Route::resource('items', ItemController::class);
    Route::resource('cuentas_cobrar', PaymentsController::class);

    Route::resource('lavanderia', ConfidencialController::class);
    Route::resource('peticion', PeticionController::class);
    Route::resource('usuarios', usuarioController::class);
    Route::resource('inventario', InventarioController::class);
    Route::resource('respuesta', RespuestaController::class);
    Route::resource('clientes', clientesController::class);
    Route::resource('notaJarceria', notaJarceriaController::class);
    Route::resource('encargados', encargadosController::class);
    Route::resource('clasification', ClasificationController::class);
    
    Route::get('usuarios/informacion', [usuarioController::class, 'ejemplo'])->name('usuarios.show');
    //Route::get('inventario/informacion', [InventarioController::class, 'inventario'])->name('inventario.show');
    Route::get('confidencial/informacion', [ConfidencialController::class, 'confidencial'])->name('confidencial.show');
    Route::get('peticion/informacion', [PeticionController::class, 'peticion'])->name('peticion.show');
    Route::get('usuarios/create', [usuarioController::class, 'create'])->name('usuarios.create');

    //Route::get('clientes/create', [usuarioController::class, 'create'])->name('usuarios.create');
    
    Route::get('peticion/respuesta', [PeticionController::class, 'respuesta'])->name('peticion.respuesta');
    Route::get('peticion/view', [ConfidencialController::class, 'view'])->name('confidencial.view');

    Route::get('accounting/payed_accounts', [PaymentsController::class, 'payed_accounts'])->name('payed_accounts');
    Route::get('reportes/contraportada', [PaymentsController::class, 'reportes'])->name('reportes.contraportada');
    
    Route::get('reportes/contraportada_axel', [PaymentsController::class, 'reportes_axel'])->name('reportes.contraportada_axel');
    Route::get('reportes/factura_resumida', [PaymentsController::class, 'factura_resumida'])->name('reportes.factura_resumida');
    
    Route::get('reportes/consecutivo_factura', [PaymentsController::class, 'consecutivo_factura'])->name('reportes.consecutivo_factura');
    Route::get('reportes/comprobante_ingresos', [PaymentsController::class, 'comprobante_ingresos'])->name('reportes.comprobante_ingresos');
    Route::get('reportes/consecutivo_comprobante', [PaymentsController::class, 'consecutivo_comprobante'])->name('reportes.consecutivo_comprobante');
    Route::get('reportes/cuentas_cobrar', [PaymentsController::class, 'rep_cuentas_cobrar'])->name('reportes.cuentas_cobrar');
    
    Route::get('items/create/{id}', [ItemController::class, 'create'])->name('items.creation');
    Route::get('accounting/pay_cancel/{id}', [PaymentsController::class, 'pay_cancel'])->name('pay_cancel');
    Route::get('tempitems/{id}', [TempItemController::class, 'create_item'])->name('tempitems.create_item');
    Route::get('tempitems/edit/{id}/{captured}', [TempItemController::class, 'edit_item'])->name('tempitems.edit_item');
    Route::get('items/edit/{id}', [ItemController::class, 'edit_item'])->name('items.edit_item');
    Route::get('internal_orders/edit/{id}', [InternalOrderController::class, 'edit_order'])->name('internal_orders.edit_order');
    Route::post('internal_orders/capture', [InternalOrderController::class, 'capture'])->name('internal_orders.capture');
    Route::post('internal_orders/firmar', [InternalOrderController::class, 'firmar'])->name('internal_orders.firmar');
    Route::post('internal_orders/dgi', [InternalOrderController::class, 'dgi'])->name('internal_orders.dgi');
    Route::post('internal_orders/redefine', [InternalOrderController::class, 'redefine'])->name('internal_orders.redefine_order');
    Route::post('internal_orders/shipments', [InternalOrderController::class, 'shipment'])->name('internal_orders.shipment');
    Route::post('internal_orders/pay_conditions', [InternalOrderController::class, 'pay_conditions'])->name('internal_orders.pay_conditions');
    Route::post('internal_orders/pay_redefine', [InternalOrderController::class, 'pay_redefine'])->name('internal_orders.pay_redefine');
    //rutas para agregar comisiones
    Route::post('captura/comissions', [InternalOrderController::class, 'comissions'])->name('captura.comissions');
    Route::post('guardar_comission', [InternalOrderController::class, 'guardar_comissions'])->name('guardar_comissions');
    Route::get('comision/edit/{id}', [InternalOrderController::class, 'edit_temp_comissions'])->name('edit_temp_comissions');
    Route::post('comision/update/{id}', [InternalOrderController::class, 'update_temp_comissions'])->name('update_temp_comissions');
    
    Route::get('accounting/order/{id}', [PaymentsController::class, 'cuentas_order'])->name('accounting.cuentas_order');
    Route::get('accounting/customer/{id}', [PaymentsController::class, 'cuentas_customer'])->name('accounting.cuentas_customer');
    Route::post('Items/redefine', [ItemController::class, 'redefine'])->name('items.redefine');
    Route::post('tempItems/redefine/{id}/{captured}', [TempItemController::class, 'redefine'])->name('temp_items.redefine');
    Route::post('internal_orders/pagos', [InternalOrderController::class, 'pagos'])->name('internal_orders.pagos');
    Route::post('accounting/pay_apply', [PaymentsController::class, 'pay_apply'])->name('accounting.pay_apply');
    Route::post('accounting/pay_amount_aply', [PaymentsController::class, 'pay_amount_apply'])->name('accounting.pay_amount_apply');
    Route::post('accounting/multi_pay_apply', [PaymentsController::class, 'multi_pay_apply'])->name('accounting.multi_pay_apply');
    
    Route::post('payments/invalidar', [PaymentsController::class, 'invalidar'])->name('accounting.invalidar');
    Route::get('payment/{id}', [InternalOrderController::class, 'payment'])->name('internal_orders.payment');
    Route::post('payment/edit/{id}', [InternalOrderController::class, 'payment_edit'])->name('internal_orders.payment_edit');
    Route::get('pay/{id}', [PaymentsController::class, 'pay_actualize'])->name('payments.pay_actualize');
    
    Route::get('pay_amount/{id}', [PaymentsController::class, 'pay_amount_actualize'])->name('payments.pay_amount_actualize');
    Route::post('multi_pay', [PaymentsController::class, 'multi_pay_actualize'])->name('payments.multi_pay_actualize');
    //metodos para reportes... 8 reportes son, bueno 7, tecnicamente son 11
    //ah pero ya nomas uso uno, soy la reata TODO: limpiar esta madre 
    Route::get('contraportada/{id}', [PaymentsController::class, 'contraportada'])->name('payments.contraportada');
    Route::get('contraportadaPDF/{id}', [ReportsController::class, 'contraportada_pdf'])->name('payments.contraportada_pdf');
    Route::get('factura_resumida/{id}', [PaymentsController::class, 'factura_resumida'])->name('payments.factura_resumida');
    Route::get('consecutivo_pedido', [PaymentsController::class, 'consecutivo_pedido'])->name('payments.consecutivo_pedido');
    Route::get('reporte/{id}/{report}/{pdf}', [PaymentsController::class, 'reporte'])->name('payments.reporte');
    
    Route::get('pedidoPDF/{id}', [ReportsController::class, 'pedido_pdf'])->name('pedido_pdf');
    Route::get('cuentas', [PaymentsController::class, 'cuentas_reporte'])->name('payments.cuentas_reporte');
    Route::post('internal_orders/partida', [InternalOrderController::class, 'partida'])->name('internal_orders.partida');
    Route::post('customer/crear_contacto', [CustomerController::class, 'contacto'])->name('customers.contacto');
    Route::post('customer/guardar_contacto', [CustomerController::class, 'store_contact'])->name('customers.store_contact');

    Route::get('/foo', function () {
        Artisan::call('storage:link');
        });
});