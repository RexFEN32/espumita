@extends('adminlte::page')

@section('title', 'ENCARGADOS')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp;Editar encargado</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-edit"></i>&nbsp; Editar informacion del encargado
            </h5>
        </div>
        @method('PUT')
        @csrf
        {!! Form::open(['method'=>'PUT','route'=>['encargados.update',$usuarios->id]]) !!}
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-6 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h5 text-center fw">Datos Generales del encargado</h1>
                        </div>
                        @foreach ($usuarios as $id)
                        @endforeach   
                        <div class="card-body">
                            <div class="form-group">
                                <x-jet-label value="* Nombre" />
                                {!! Form::text('nombre',old('nombre'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                                <x-jet-input-error for='nombre' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Teléfono Móvil" />
                                {!! Form::text('numero',old('numero'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                                <x-jet-input-error for='numero' />
                            </div>                            
                        </div>
                    </div>
                </div>                 
                <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('encargados.index')}}" class="btn btn-green mb-2">
                    <i class="fas fa-home fa-2x"></i>&nbsp;&nbsp; Home
                </a>
                <button type="submit" class="btn btn-blue mb-2">
                    <i class="fas fa-arrow-up fa-2x"></i>&nbsp; &nbsp; Guardar
                </button>
                </div>
@stop