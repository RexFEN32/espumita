<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;

class confidenciales extends Model
{
    use HasFactory;
    protected $fillable = [
        'confidencial1',
        'confidencial2',
        'confidencial3',
        
    ];
    
public function create()
{
    $clientes = Clientes::pluck('nombre', 'id'); // Esto asume que tienes un campo 'nombre' en tu tabla de clientes y un campo 'id' como clave primaria.

    return view('tu_vista', compact('clientes'));
}

}

