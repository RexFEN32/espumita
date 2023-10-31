@extends('adminlte::page')

@section('title', 'USUARIOS')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-plus-circle"></i>&nbsp; Crear nota de Jarceria</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Agregar Datos
                    <a href="{{ route('clientes.create')}}" class="btn btn-pink mb-2" style="float: right; background-color: pink;">
                        <i class="fas fa-cat fa-2x"></i>&nbsp;&nbsp; Agregar cliente
                    </a>
            </h5>
        </div>
        {!! Form::open(['method'=>'POST','route'=>['notaJarceria.store']]) !!}
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            
            <div class="form-group">
                            <x-jet-label value="* Cliente" />
                            <select class="form-capture  w-full text-xs uppercase" name="name" id='name'>
                                    @foreach ($cliente as $id)
                                        <option value="{{$id->name}}" @if ($id->name == old('name')) selected @endif > {{$id->name}}---{{$id->number}}</option>
                                    @endforeach
                            </select>
                            <x-jet-input-error for='name' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Vendedor" />
                            <select class="form-capture  w-full text-xs uppercase" name="vendedor" id='name'>
                                    @foreach ($vendedor as $id)
                                        <option value="{{$id->vendedor}}" @if ($id->vendedor == old('vendedor')) selected @endif > {{$id->name}}</option>
                                    @endforeach
                            </select>
                            <x-jet-input-error for='vendedor' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Zona" />
                            <select class="form-capture  w-full text-xs uppercase" name="zones" id='zones'>
                            @foreach ($zones as $id)
                                        <option value="{{$id->zones}}" @if ($id->vendedor == old('zones')) selected @endif > {{$id->zone}}</option>
                                    @endforeach
                            </select>
                            <x-jet-input-error for='zones' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Clasificacion" />
                            <select class="form-capture  w-full text-xs uppercase" name="clasificacion" id='clasificacion'>
                            @foreach ($clasificacion as $id)
                                        <option value="{{$id->clasificacion}}" @if ($id->vendedor == old('clasificacion')) selected @endif > {{$id->clasificacion}}</option>
                            @endforeach
                            </select>
                            <x-jet-input-error for='clasificacion' />
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Fecha de entrega" />
                    {!! Form::text('fecha_entrega',old('fecha_entrega'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='fecha_entrega' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Anticipo" />
                    {!! Form::text('anticipo',old('anticipo'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='anticipo' />
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
                    <x-jet-label value="* Cantidad" />
                    {!! Form::text('cantidad',old('cantidad'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='cantidad' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Precio" />
                    {!! Form::text('precio',old('precio'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='precio' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Importe" />
                    {!! Form::text('importe',old('importe'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='importe' />
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