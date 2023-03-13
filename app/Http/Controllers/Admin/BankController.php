<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = bank::all();

        return view('admin.banks.index', compact('banks'));
    }
}
