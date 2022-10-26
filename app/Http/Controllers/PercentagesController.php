<?php

namespace App\Http\Controllers;

use App\Models\percentages;
use App\Http\Requests\StorepercentagesRequest;
use App\Http\Requests\UpdatepercentagesRequest;

class PercentagesController extends Controller
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
     * @param  \App\Http\Requests\StorepercentagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepercentagesRequest $request)
    {
      $percentage = new percentages;
      $percentage->factures = $request->factures;
      $percentage->finances = $request->finances;
      $percentage->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\percentages  $percentages
     * @return \Illuminate\Http\Response
     */
    public function show(percentages $percentages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\percentages  $percentages
     * @return \Illuminate\Http\Response
     */
    public function edit(percentages $percentages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepercentagesRequest  $request
     * @param  \App\Models\percentages  $percentages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepercentagesRequest $request, percentages $percentages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\percentages  $percentages
     * @return \Illuminate\Http\Response
     */
    public function destroy(percentages $percentages)
    {
        //
    }
}
