<?php

namespace App\Http\Controllers;

use App\Models\payments;
use App\Http\Requests\StorepaymentsRequest;
use App\Http\Requests\UpdatepaymentsRequest;
use Illuminate\Http\Request;
class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = payments::where('status', 'por cobrar')->get();
        return view('accounting.cuentas_cobrar', compact(
            'accounts',
        ));
    }
     
    public function pay_actualize($id)
    {
        //$accounts = payments::where('status', 'por cobrar')->get();
        $pay = payments::find($id);
        return view('accounting.pay_actualize', compact(
            'pay',
        ));
    }


    public function pay_apply(Request $request)
    {
        
        $id=$request->pay_id;
        $comp = $request->comprobante;
        $pay = payments::find($id);
        $pay->status ="pagado";
        $pay->save();
        //$nombre = strval($pay->id) . "comp";
        $nombre = $comp->getClientOriginalName();
        $nombre_con_id= strval($pay->id).$nombre;
        \Storage::disk('local')->put($nombre_con_id,  \File::get($comp));
        return view('accounting.pay_actualize', compact(
            'pay',
        ));


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
