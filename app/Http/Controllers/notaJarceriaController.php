<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Clientes;
use App\Models\Clasificaciones;
use App\Models\Nota;
use App\Models\Zones;
use App\Models\lavanderia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;;

class notaJarceriaController extends Controller
{
    public function index()
    {
        $nota = Nota::all();
        $lavanderia = lavanderia::all();
        $clasificacion = Clasificaciones::all();
        $cliente = Clientes::all();
        $usuarios = User::all();
        $zones = Zones::all();
        return view('notaJarceria.index', compact('nota','cliente','usuarios','zones','clasificacion','lavanderia'));
    }
 
    public function create()
    {  
        
        $nota = Nota::all();
        $clasificacion = Clasificaciones::all();
        $cliente = Clientes::all();
        $vendedor = User::all();
        $zones = Zones::all();
        return view('notaJarceria.create', compact('nota','cliente','vendedor','zones','clasificacion'));
    }

    public function store(Request $request)
    {
        $rules = [
          
        ];

        $messages = [
  
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        $user = Nota::create($input);
        $user->name = $request->name;
        $user->vendedor = $request->vendedor;
        $user->anticipo = $request->anticipo;
        $user->fecha_entrega = $request->fecha_entrega;
        $user->servicio = $request->servicio;
        $user->descripcion = $request->descripcion;
        $user->precio = $request->precio;
        $user->importe = $request->importe;
        $user->cantidad = $request->cantidad;
        $user->save();
        return redirect()->route('notaJarceria.index')->with('create_reg', 'ok');
    }


    public function edit($id)
    {  
        $usuarios = Nota::find($id);
        $user_id = $id;
        $Clientes = Clientes::all();
        $Vendedores = User::all();
        $zones = Zones::all();
        $clasificacion = Clasificaciones::all();
        return view('notaJarceria.edit', compact('usuarios','user_id','Clientes','Vendedores','zones','clasificacion'));
    }

    
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            
        ];

        $messages = [
            'name.required' => 'Escriba el nombre del Rol que desea Generar',
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        $user = Nota::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->name = $request->name;
        $user->vendedor = $request->vendedor;
        $user->anticipo = $request->anticipo;
        $user->fecha_entrega = $request->fecha_entrega;
        $user->descripcion = $request->descripcion;
        $user->precio = $request->precio;
        $user->importe = $request->importe;
        $user->cantidad = $request->cantidad;
        $user->save();
        return redirect()->route('notaJarceria.index')->with('update_reg', 'ok');
    }
    public function show($id)
    {  
        $usuarios = Nota::find($id);
        $user_id = $id;
        $Clientes = Clientes::all();
        $Vendedores = User::find($id);
        $zones = Zones::all();
        $clasificacion = Clasificaciones::all();
        return view('notaJarceria.show', compact('usuarios','user_id','Clientes','Vendedores','zones','clasificacion'));
    }

    public function view(Request $request, $id)
    {  
        $rules = [
            'name' => 'required',
            
        ];

        $messages = [
            'name.required' => 'Escriba el nombre del Rol que desea Generar',
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        $user = Nota::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->name = $request->name;
        $user->vendedor = $request->vendedor;
        $user->anticipo = $request->anticipo;
        $user->fecha_entrega = $request->fecha_entrega;
        $user->descripcion = $request->descripcion;
        $user->precio = $request->precio;
        $user->importe = $request->importe;
        $user->cantidad = $request->cantidad;
        $user->save();
        return redirect()->route('notaJarceria.index')->with('update_reg', 'ok');
    }
    public function destroy($id)
    {
        Nota::destroy($id);

        return redirect()->route('notaJarceria.index')->with('eliminar', 'ok');
    }

}
