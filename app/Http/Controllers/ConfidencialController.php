<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Clientes;
use App\Models\lavanderia;
use App\Models\Clasificaciones;
use App\Models\Nota;
use App\Models\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class ConfidencialController extends Controller
{
    public function index()
    {
        //$usuarios = Nota::where('id', '<>', '1')->get();
        $usuarios = Nota::all();
        //$clientes = Clientes::all();
        $lavanderia = lavanderia::all();
        $clientes= DB::table('notas')->join('clientes','clientes.id','=','notas.id_cliente') ->get();
        //$lavanderia= DB::table('lavanderias')->join('clientes','clientes.id','=','lavanderias.id_cliente') ->get();


        return view('lavanderia.index', compact('usuarios','clientes','lavanderia'));
    }

    public function create()
    {  
        
        $nota = Nota::all();
        $clasificacion = Clasificaciones::all();
        $Clientes = Clientes::all();
        $Vendedores = User::all();
        $zones = Zones::all();
        return view('lavanderia.create', compact('nota','Clientes','Vendedores','zones','clasificacion'));
    }

    public function store(Request $request)
    {
        $rules = [
          
        ];

        $messages = [
  
        ];
        $request->validate($rules, $messages);
        $input = $request->all();
        $user = lavanderia::create($input);
        $user->id_cliente = $request->id_cliente;
        $user->name = $request->name;
        $user->vendedor = $request->vendedor;
        $user->anticipo = $request->anticipo;
        $user->fecha_entrega = $request->fecha_entrega;
        $user->servicio = $request->servicio;
        $user->descripcion = $request->descripcion;
        $user->precio = $request->precio;
        $user->importe = $request->importe;
        $user->cantidad = $request->cantidad;
        $user->clasification = $request->clasification;
        $user->zone = $request->zone;
        $user->servicio = $request->servicio;
        $user->impuesto1 = $request->impuesto1;
        $user->impuesto2 = $request->impuesto2;
        $user->descuento = $request->descuento;
        $user->save();
        return redirect()->route('lavanderia.index')->with('create_reg', 'ok');
    }


    public function edit($id)
    {  
        $usuarios = lavanderia::find($id);
        $user_id = $id;
        $Clientes = Clientes::all();
        $Vendedores = User::all();
        $zones = Zones::all();
        $clasificacion = Clasificaciones::all();
        return view('lavanderia.edit', compact('usuarios','user_id','Clientes','Vendedores','zones','clasificacion'));
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
        $user = lavanderia::find($id);
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
        $user->clasification = $request->clasification;
        $user->zone = $request->zone;
        $user->servicio = $request->servicio;
        $user->impuesto1 = $request->impuesto1;
        $user->impuesto2 = $request->impuesto2;
        $user->descuento = $request->descuento;
        $user->save();
        return redirect()->route('lavanderia.index')->with('update_reg', 'ok');
    }
    public function show( $id)
    {  
        $usuarios = Nota::find($id);
        $user_id = $id;
        //$Clientes = Clientes::find($id);
        $Clientes = Clientes::all();
        $Vendedores = User::find($id);
        $lavanderia = lavanderia::find($id);
        $zones = Zones::all();
        //$Clientes= DB::table('clientes')->join('lavanderias','lavanderias.id','=','clientes.id') ->get();
        $clasificacion = Clasificaciones::all();
        return view('lavanderia.show', compact('usuarios','lavanderia','user_id','Clientes','Vendedores','zones','clasificacion'));
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
        return redirect()->route('lavanderia.index')->with('update_reg', 'ok');
    }
    public function destroy($id)
    {
        lavanderia::destroy($id);

        return redirect()->route('lavanderia.index')->with('eliminar', 'ok');
    }
}
