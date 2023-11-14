<?php

namespace App\Http\Controllers;
use App\Models\Clasificaciones;
use App\Models\Clientes;
use App\Models\Zones;
use Illuminate\Http\Request;

class ClasificationController extends Controller
{
    public function index()
    {
        $usuarios = Clasificaciones::all();
        return view('clasification.index', compact(
            'usuarios',
        ));
    } 

    public function create()
    {
        $usuarios = Clasificaciones::all();
        $zones = Zones::all();
        return view('clasification.create', compact('usuarios','zones'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            
        ];
        $messages = [
            'name.required' => 'Escriba el nombre del Usuario que desea Generar',
            
         
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        $user = Clasificaciones::create($input);
        $user->name = $request->name;
        $user->descripcion = $request->descripcion;
        $user->save();
        return redirect()->route('clasification.index')->with('create_reg', 'ok');
    }
}
