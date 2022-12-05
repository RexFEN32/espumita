<?php

namespace App\Http\Controllers;

use App\Models\historical_payments;
use App\Http\Requests\Storehistorical_paymentsRequest;
use App\Http\Requests\Updatehistorical_paymentsRequest;

class HistoricalPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Storehistorical_paymentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storehistorical_paymentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historical_payments  $historical_payments
     * @return \Illuminate\Http\Response
     */
    public function show(historical_payments $historical_payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historical_payments  $historical_payments
     * @return \Illuminate\Http\Response
     */
    public function edit(historical_payments $historical_payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatehistorical_paymentsRequest  $request
     * @param  \App\Models\historical_payments  $historical_payments
     * @return \Illuminate\Http\Response
     */
    public function update(Updatehistorical_paymentsRequest $request, historical_payments $historical_payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historical_payments  $historical_payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(historical_payments $historical_payments)
    {
        //
    }
}
