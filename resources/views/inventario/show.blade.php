@extends('adminlte::page')

@section('title', 'INVENTARIO')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp;Inventario del Producto</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-edit"></i>&nbsp; Ver inventario del Producto
            </h5>
        </div>
            @method('PUT')
        @csrf
        
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-6 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h5 text-center fw">Datos Generales del Producto</h1>
                        </div>                          
                        <div class="card-body">
                            <div class="form-group">
                                <x-jet-label value="ID" />
                                <x-jet-label type="text" name="id" class="w-full text-xs " value="{{ $inventario->id }}"/>
                                <x-jet-input-error for='id' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Unidad" />
                                <x-jet-label type="text" name="name" class="w-full text-xs " value="{{$inventario->name}}"/>
                                <x-jet-input-error for='name' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Descripcion" />
                                <x-jet-label type="text" name="descripcion" class="w-full text-xs " value="{{ $inventario->descripcion}}"/>
                                <x-jet-input-error for='descripcion' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Existencia" />
                                <x-jet-label type="text" name="existencia" class="w-full text-xs " value="{{($inventario->existencia).' Piezas'}}"/>
                                <x-jet-input-error for='existencia' />
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h5 text-center fw">Datos sobre el inventario</h1>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <div class="form-group">
                                <x-jet-label value="* Precio De Venta" />
                                <x-jet-label type="text" name="precio_venta" class="w-full text-xs " value="{{ '$' . number_format($inventario->precio_venta, 2) }}"/>
                                <x-jet-input-error for='precio_venta' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Precio Minimo" />
                                <x-jet-label type="text" name="precio_minimo" class="w-full text-xs " value="{{ '$' . number_format($inventario->precio_minimo, 2) }}"/>
                                <x-jet-input-error for='precio_minimo' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Precio Alternativo (1)" />
                                <x-jet-label type="text" name="precio_1" class="w-full text-xs " value="{{ '$' . number_format ($inventario->precio_1, 2) }}"/>
                                <x-jet-input-error for='precio_1' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Precio Alternativo (2)" />
                                <x-jet-label type="text" name="precio_2" class="w-full text-xs " value="{{ '$' . number_format ($inventario->precio_2, 2) }}"/>
                                <x-jet-input-error for='precio_2' />
                            </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
    
        <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('inventario.index')}}" class="btn btn-green mb-2">
                    <i class="fas fa-home fa-2x"></i>&nbsp;&nbsp; Menu principal
                </a>
                
        </div>
@stop