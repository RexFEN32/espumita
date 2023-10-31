<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zones;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::where('id', '<>', '1')->get();

        return view('usuarios.index', compact(
            'usuarios',
        ));
    } 
    public function create()
    {
        $usuarios = User::all();
        $zones = Zones::all();
        return view('usuarios.create', compact('usuarios','zones'));
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
            'password.required' => 'Escriba un Password',
            'email.unique' => 'El email capturado ya existe en el sistema',
            'email.email' => 'Escriba un Email válido',
         
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        $user = User::create($input);
        $input['password'] = Hash::make($input['password']);
        $user->porcentaje = $request->porcentaje;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->numero_fijo = $request->numero_fijo;
        $user->save();
        return redirect()->route('usuarios.index')->with('create_reg', 'ok');
    }

    public function show()
    {  
        $usuarios = User::all();
        
        return view('usuarios.show', compact('usuarios'));
    } 
    public function edit($id)
    {  
        $usuarios = User::find($id);
        $user_id = $id;
        $zones = Zones::all();
        return view('usuarios.edit', compact('usuarios','user_id','zones'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ];

        $messages = [
            'name.required' => 'Escriba el nombre del Rol que desea Generar',
            'email.required' => 'required',
            'email.unique' => 'El email capturado ya existe en el sistema',
            'email.email' => 'Escriba un email válido',
        ];

        $request->validate($rules, $messages);

        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();      
        $user->name = $request->name;      
        $user->email = $request->email;     
        $user->number = $request->number;  
        $user->porcentaje = $request->porcentaje;    
        $user->numero_fijo = $request->numero_fijo;
        $user->save();
        return redirect()->route('usuarios.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('usuarios.index')->with('eliminar', 'ok');
    }
}
