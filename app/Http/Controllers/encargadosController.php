<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Clientes;
use App\Models\Clasificaciones;
use App\Models\Nota;
use App\Models\Zones;
use App\Models\Encargados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;;

class encargadosController extends Controller
{
    public function index()
    {
        $nota = Nota::all();
        $clasificacion = Clasificaciones::all();
        $cliente = Clientes::all();
        $usuarios = Encargados::all();
        $zones = Zones::all();
        
        return view('encargados.index', compact('nota','cliente','usuarios','zones','clasificacion'));
    }

    public function create()
    {          
        $usuarios = Encargados::all(); 
        return view('encargados.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',    
            'numero' => 'required',
        ];
        $messages = [
            'name.required' => 'Escriba el nombre del Usuario que desea Generar',
            'email.required' => 'Escriba un Email',
            'email.unique' => 'El email capturado ya existe en el sistema',
            'email.email' => 'Escriba un Email válido',
         
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        $user = Encargados::create($input);
        $user->numero = $request->numero;
        $user->nombre = $request->nombre;
        $user->save();
        return redirect()->route('encargados.index')->with('create_reg', 'ok');
    }

    public function edit($id)
    {  
        $usuarios = Encargados::find($id);
        $user_id = $id;
        $zones = Zones::all();
        return view('encargados.edit', compact('usuarios','user_id','zones'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nombre' => 'required',
            
            
        ];

        $messages = [
            'name.required' => 'Escriba el nombre del Rol que desea Generar',
            'email.required' => 'required',
            'email.unique' => 'El email capturado ya existe en el sistema',
            'email.email' => 'Escriba un email válido',
            'roles.required' => 'Elija el Rol del Usuario',
        ];

        $request->validate($rules, $messages);
        $input = $request->all();
        $user = Encargados::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->nombre = $request->nombre;
        $user->numero = $request->numero;
        $user->save();
        return redirect()->route('encargados.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        Encargados::destroy($id);
        return redirect()->route('encargados.index')->with('eliminar', 'ok');
    }

}
