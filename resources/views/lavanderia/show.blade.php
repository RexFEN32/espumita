@extends('adminlte::page')

@section('title', 'CONFIDENCIALES')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-plus-circle"></i>&nbsp; Ver Nota de Lavanderia</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Ver Nota de Lavanderia
            </h5>
        </div>
        
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
            <div class="form-group">
                            <x-jet-label value="* Cliente" />
                            <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ 'Indira' }}"/>
                            <x-jet-input-error for='name' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Vendedor" />
                            <input type="hidden" name="id" value="{{$lavanderia->id}}"/> 
                          <!--  <select class="form-label  w-full text-xs uppercase" name="vendedor" id='name'>-->
                          <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ $lavanderia->name }}"/>
                          
                            </select>
                            <x-jet-input-error for='clientes' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Zona" />
                           <!-- <select class="form-label  w-full text-xs uppercase" name="zones" id='zones'> -->
                            <x-jet-label type="text" name="zona" class="w-full text-xs " value="{{ 'Indira' }}"/>
                            </select>
                            <x-jet-input-error for='zona' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Clasificacion" />
                            <!-- <select class="form-label  w-full text-xs uppercase" name="clasificacion" id='clasificacion'> -->
                            <x-jet-label type="text" name="clasificacion" class="w-full text-xs " value="{{ 'Indira' }}"/>
                            </select>
                            <x-jet-input-error for='clasificacion' />
            </div>
           
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Fecha de entrega" />
                    <x-jet-label type="text" name="fecha_entrega" class="w-full text-xs " value="{{ 'Indira' }}"/>
                    <x-jet-input-error for='fecha_entrega' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Anticipo" />
                    <x-jet-label type="text" name="anticipo" class="w-full text-xs " value="{{ 'Indira' }}"/>
                    <x-jet-input-error for='anticipo' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Descripcion" />
                    <x-jet-label type="text" name="descripcion" class="w-full text-xs " value="{{ 'Indira' }}"/>
                    <x-jet-input-error for='descripcion' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Cantidad" />
                    <x-jet-label type="text" name="cantidad" class="w-full text-xs " value="{{ 'Indira' }}"/>
                    <x-jet-input-error for='cantidad' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Precio" />
                    <x-jet-label type="text" name="precio" class="w-full text-xs " value="{{ 'Indira' }}"/>
                    <x-jet-input-error for='precio' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Importe" />
                    <x-jet-label type="text" name="importe" class="w-full text-xs " value="{{ 'Indira' }}"/>
                    <x-jet-input-error for='importe' />
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">                
                <a href="{{ route('lavanderia.index')}}" class="btn btn-green mb-2">
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