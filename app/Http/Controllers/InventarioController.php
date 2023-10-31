<?php

namespace App\Http\Controllers;
use App\Models\inventario;
use App\Models\User;
use App\Models\Zones;
use App\Models\Roles;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class InventarioController extends Controller
{
    public function index()
    {
        $usuarios = inventario::all();

        return view('inventario.index', compact(
            'usuarios',
        ));
    }

    public function create()
    {          
        $usuarios = User::all();                        
        return view('inventario.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $rules = [
          
        ];

        $messages = [
  
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        $user = inventario::create($input);
        $user->unidad = $request->unidad;
        $user->descripcion = $request->descripcion;
        $user->existencia = $request->existencia;
        $user->unidad = $request->unidad;
        $user->precio_venta = $request->precio_venta;
        $user->precio_minimo = $request->precio_minimo;
        $user->precio_1 = $request->precio_1;
        $user->precio_2 = $request->precio_2;
        $user->save();
        return redirect()->route('inventario.index')->with('create_reg', 'ok');
    } 

    public function show($id)
    {  
        $inventario = inventario::all();
        return view('inventario.show', compact('inventario'));
    } 

    public function edit($id)
    {  
        $usuarios = inventario::find($id);
        $user_id = $id;
        $roles = Role::pluck('name', 'name')->all();
        return view('inventario.edit', compact('usuarios','roles', 'user_id'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
           
            
            
        ];

        $messages = [
            
        ];

        $request->validate($rules, $messages);
        $input = $request->all();
        $user = Inventario::find($id);
        $user->update($input);
        $user->unidad = $request->unidad;
        $user->descripcion = $request->descripcion;
        $user->existencia = $request->existencia;
        $user->unidad = $request->unidad;
        $user->precio_venta = $request->precio_venta;
        $user->precio_minimo = $request->precio_minimo;
        $user->precio_1 = $request->precio_1;
        $user->precio_2 = $request->precio_2;
        $user->save();
        return redirect()->route('inventario.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        inventario::destroy($id);

        return redirect()->route('inventario.index')->with('eliminar', 'ok');
    }
}
