@extends('adminlte::page')

@section('title', 'INVENTARIO')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-plus-circle"></i>&nbsp; Editar inventario del equipo</h1>
@stop
 
@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Editar inventario
            </h5>
        </div>
        {!! Form::open(['method'=>'PUT','route'=>['inventario.update',$usuarios->id]]) !!}
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Unidad" />
                    {!! Form::text('unidad',old('unidad'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='unidad' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Descripcion" />
                    {!! Form::text('descripcion',old('descripcion'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='descripcion' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Existencia" />
                    {!! Form::text('existencia',old('existencia'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='existencia' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Precio de Venta" />
                    {!! Form::text('precio_venta',old('precio_venta'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='precio_venta' />
                </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Precio Minimo" />
                    {!! Form::text('precio_minimo',old('precio_minimo'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='precio_minimo' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Precio 1" />
                    {!! Form::text('precio_1',old('precio_1'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='precio_1' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Precio 2" />
                    {!! Form::text('precio_2',old('precio_2'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='precio_2' />
                </div>
            </div>
            
            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('admin.index')}}" class="btn btn-red mb-2">
                    <i class="fas fa-times fa-2x"></i>&nbsp;&nbsp; Cancelar
                </a>
                <button type="submit" class="btn btn-green mb-2">
                    <i class="fas fa-save fa-2x"></i>&nbsp; &nbsp; Guardar
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop