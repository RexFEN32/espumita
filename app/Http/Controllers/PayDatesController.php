<?php

namespace App\Http\Controllers;

use App\Models\Pay_dates;
use App\Http\Requests\StorePay_datesRequest;
use App\Http\Requests\UpdatePay_datesRequest;

class PayDatesController extends Controller
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
     * @param  \App\Http\Requests\StorePay_datesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePay_datesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay_dates  $pay_dates
     * @return \Illuminate\Http\Response
     */
    public function show(Pay_dates $pay_dates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pay_dates  $pay_dates
     * @return \Illuminate\Http\Response
     */
    public function edit(Pay_dates $pay_dates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePay_datesRequest  $request
     * @param  \App\Models\Pay_dates  $pay_dates
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePay_datesRequest $request, Pay_dates $pay_dates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pay_dates  $pay_dates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pay_dates $pay_dates)
    {
        //
    }
}
