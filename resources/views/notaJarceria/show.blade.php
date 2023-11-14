@extends('adminlte::page')

@section('title', 'CONFIDENCIALES')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-plus-circle"></i>&nbsp; Ver Nota de Jarceria</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Ver Nota de Jarceria
            </h5>
        </div>
        
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
            <div class="form-group">
                            <x-jet-label value="* Cliente" />
                            <input type="hidden" name="name" value="{{$nota->id}}"/> 
                            <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ $nota->name }}"/>
                            <x-jet-input-error for='name' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Vendedor" />
                            <input type="hidden" name="id" value="{{$nota->id}}"/> 
                          <!--  <select class="form-label  w-full text-xs uppercase" name="vendedor" id='name'>-->
                          <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ $nota->vendedor }}"/>
                          
                            </select>
                            <x-jet-input-error for='clientes' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Zona" />
                            <input type="hidden" name="name" value="{{$nota->id}}"/> 
                            <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ $nota->zone }}"/>
                            </select>
                            <x-jet-input-error for='zona' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Clasificacion" />
                            <input type="hidden" name="name" value="{{$nota->id}}"/> 
                            <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ $nota->clasification }}"/>
                            </select>
                            <x-jet-input-error for='clasificacion' />
            </div>
           
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Fecha de entrega" />
                    <input type="hidden" name="name" value="{{$nota->id}}"/> 
                    <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ $nota->fecha_entrega }}"/>
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Anticipo" />
                    <input type="hidden" name="name" value="{{$nota->id}}"/> 
                    <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ $nota->anticipo }}"/>
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Descripcion" />
                    <input type="hidden" name="name" value="{{$nota->id}}"/> 
                    <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ $nota->descripcion }}"/>
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Cantidad" />
                    <input type="hidden" name="name" value="{{$nota->id}}"/> 
                    <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ $nota->cantidad }}"/>
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Precio" />
                    <input type="hidden" name="name" value="{{$nota->id}}"/> 
                    <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ $nota->precio }}"/>
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Importe" />
                    <input type="hidden" name="name" value="{{$nota->id}}"/> 
                    <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ $nota->importe }}"/>
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">                
                <a href="{{ route('notaJarceria.index')}}" class="btn btn-green mb-2">
                    <i class="fas fa-home fa-2x"></i>&nbsp;&nbsp; Menu principal
                </a>
            </div>
        </div>

        
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop