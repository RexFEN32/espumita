<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Clientes;
use App\Models\Clasificaciones;
use App\Models\Nota;
use App\Models\lavanderia;
use App\Models\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;;

class lavanderiaController extends Controller
{
    public function index()
    {
        $nota = Nota::all();
        $lavanderia = lavanderia::all();
        $clasificacion = Clasificaciones::all();
        $cliente = Clientes::all();
        $usuarios = User::all();
        $zones = Zones::all();
        return view('lavanderia.index', compact('nota','cliente','usuarios','zones','clasificacion','lavanderia'));
    }
 
    public function create()
    {  
        
        $nota = Nota::all();
        $clasificacion = Clasificaciones::all();
        $cliente = Clientes::all();
        $vendedor = User::all();
        $zones = Zones::all();
        return view('lavanderia.create', compact('nota','cliente','vendedor','zones','clasificacion'));
    }

    
    

    public function destroy($id)
    {
        lavanderia::destroy($id);

        return redirect()->route('lavanderia.index')->with('eliminar', 'ok');
    }
}
