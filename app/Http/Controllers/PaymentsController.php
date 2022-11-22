<?php

namespace App\Http\Controllers;
use App\Models\InternalOrder;
use App\Models\payments;
use App\Models\Customer;
use App\Http\Requests\StorepaymentsRequest;
use App\Http\Requests\UpdatepaymentsRequest;
use Illuminate\Http\Request;
use SplFileInfo;
use Illuminate\Support\Facades\Storage;
use DB;
class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$accounts = payments::where('status', 'por cobrar')->get();
        $total = payments::where('status', 'por cobrar')->get()->sum('amount');
        $url = " ";
        $accounts = DB::table('payments')
            ->join('internal_orders', 'internal_orders.id', '=', 'payments.order_id')
            ->select('payments.*','internal_orders.customer_id','internal_orders.invoice')
            ->get();
        $Customers = Customer::all();
        $Orders = DB::table('internal_orders')
        ->join('customers', 'internal_orders.customer_id', '=', 'customers.id')
        ->join('coins', 'internal_orders.coin_id','=','coins.id')
        ->select('internal_orders.*','customers.customer','coins.symbol')
        ->get();
        return view('accounting.cuentas_cobrar', compact(
            'accounts',
            'total',
            'url',
            'Customers',
            'Orders'
        ));
    }
     
    public function payed_accounts()
    {
        $accounts = payments::where('status', 'pagado')->get();
        $total = $accounts->sum('amount');
        
        return view('accounting.cuentas_pagadas', compact(
            'accounts',
            'total',
            
        ));
    }
    
    public function pay_actualize($id)
    {
        //$accounts = payments::where('status', 'por cobrar')->get();
        $pay = payments::find($id);
        $order = InternalOrder::find($pay->order_id);
        $url =  "'/".$pay->id.".pdf'";
  
        return view('accounting.pay_actualize', compact(
            'pay',
            'order',
            'url'
        ));
    }
    
    public function pay_cancel($id)
    {
        //$accounts = payments::where('status', 'por cobrar')->get();
        $pay = payments::find($id);
        $order = DB::table('Internal_orders')
            ->join('customers', 'internal_orders.customer_id', '=', 'customers.id')
            ->where('internal_orders.id','=',$pay->order_id)
            ->select('internal_orders.*','customers.customer')
            ->first();
        //$order = $InternalOrders::find($pay->order_id);
        return view('accounting.pay_cancel', compact(
            'pay',
            'order',
        ));
    }

    public function pay_apply(Request $request)
    {   
        $id=$request->pay_id;
        $comp = $request->comprobante;
        $pay = payments::find($id);
        $pay->status ="pagado";
        $pay->save();
        $order = InternalOrder::find($pay->order_id);
        #$nombre = strval($pay->id) . "comp";
        #$info = new SplFileInfo('foo.txt');
        $nombre = $comp->getClientOriginalName();
        $nombre_con_id= strval($pay->id).substr($nombre,-4);
        \Storage::disk('public')->put($nombre_con_id,  \File::get($comp));
        $url = "'/".$nombre_con_id."'";
        return view('accounting.pay_actualize', compact(
            'pay',
            'order',
            'url',
        ));
    }

    public function invalidar(Request $request)
    {   
        $id=$request->pay_id;
        $pay = payments::find($id);
        $pay->status ="por cobrar";
        $pay->save();
        return $this->index();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepaymentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepaymentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepaymentsRequest  $request
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepaymentsRequest $request, payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(payments $payments)
    {
        //
    }
}
