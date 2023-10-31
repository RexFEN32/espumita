<?php

namespace App\Http\Controllers;
use App\Models\peticiones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeticionController extends Controller
{
     public function index()
    {
        $usuarios = peticiones::where('id', '<>', '1')->get();

        return view('peticion.index', compact(
            'usuarios',
        ));
    }

    public function store(Request $request)
    {
        $rules = [
          
        ];

        $messages = [
  
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        $user = peticiones::create($input);
        $user->peticion = $request->peticion;
        $user->status = $request->status;
        $user->respuesta = $request->respuesta;
        $user->save();
        return redirect()->route('admin.index')->with('create_reg', 'ok');
    }

    public function show()
    {  
        $usuarios = peticiones::all();
        return view('peticion.show', compact('usuarios'));
    }

    public function create()
    {  
        $usuarios = peticiones::all();
        return view('peticion.create', compact('usuarios'));
    }

} 
