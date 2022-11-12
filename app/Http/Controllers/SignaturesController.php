<?php

namespace App\Http\Controllers;

use App\Models\signatures;
use App\Http\Requests\StoresignaturesRequest;
use App\Http\Requests\UpdatesignaturesRequest;

class SignaturesController extends Controller
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
     * @param  \App\Http\Requests\StoresignaturesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresignaturesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\signatures  $signatures
     * @return \Illuminate\Http\Response
     */
    public function show(signatures $signatures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\signatures  $signatures
     * @return \Illuminate\Http\Response
     */
    public function edit(signatures $signatures)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesignaturesRequest  $request
     * @param  \App\Models\signatures  $signatures
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesignaturesRequest $request, signatures $signatures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\signatures  $signatures
     * @return \Illuminate\Http\Response
     */
    public function destroy(signatures $signatures)
    {
        //
    }
}
