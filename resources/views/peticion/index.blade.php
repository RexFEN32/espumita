@extends('adminlte::page')

@section('title', 'PETICION')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp;Peticion del Usuario</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Agregar Peticion del usuario
            </h5>
        </div>
        @method('PUT')
        @csrf
        {!! Form::open(['method'=>'POST','route'=>['peticion.store']]) !!}
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Peticion del usuario" />
                    {!! Form::text('peticion',old('peticion'), ['class'=>'inputjet w-full text-xs uppercase ']) !!}
                    <x-jet-input-error for='monitor' />
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