<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\Clientes;
use App\Models\Zones;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class clientesController extends Controller
{
    public function index()
    {
        $usuarios = Clientes::all();
        return view('clientes.index', compact(
            'usuarios',
        ));
    } 
    public function create()
    {
        $usuarios = Clientes::all();
        $zones = Zones::all();
        return view('clientes.create', compact('usuarios','zones'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'number' => 'required',
        ];
        $messages = [
            'name.required' => 'Escriba el nombre del Usuario que desea Generar',
            'email.required' => 'Escriba un Email',
            'email.unique' => 'El email capturado ya existe en el sistema',
            'email.email' => 'Escriba un Email válido',
         
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        $user = Clientes::create($input);
        $user->email = $request->email;
        $user->number = $request->number;
        $user->numero_fijo = $request->numero_fijo;
        $user->numero_tarjeta = $request->numero_tarjeta;
        $user->zone = $request->zone;
        $user->save();
        return redirect()->route('clientes.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {  
        $clientes = Clientes::find($id);
        $roles = Role::pluck('name', 'name')->all();
        return view('clientes.show', compact('clientes','roles'));
    } 
    public function edit($id)
    {  
        $usuarios = Clientes::find($id);
        $user_id = $id;
        $zones = Zones::all();
        return view('clientes.edit', compact('usuarios','user_id','zones'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
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
        $user = Clientes::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->zone = $request->zone;
        $user->numero_tarjeta = $request->numero_tarjeta;
        $user->save();
        return redirect()->route('clientes.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        Clientes::destroy($id);
        return redirect()->route('clientes.index')->with('eliminar', 'ok');
    }
}
