<?php

namespace App\Http\Controllers;
use App\Models\peticiones;
use Illuminate\Http\Request;

class RespuestaController extends Controller
{
    public function index()
    {
        $usuarios = peticiones::where('id', '<>', '1')->get();

        return view('respuesta.index', compact(
            'usuarios',
        ));
    }
}
