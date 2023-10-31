@extends('adminlte::page')

@section('title', 'PETICION')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-plus-circle"></i>&nbsp; Ver peticion del usuario</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Ver la peticion del usuario y el Status en que se encuentra
            </h5>
        </div>
        @foreach ($usuarios as $id)
        @endforeach
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="*La peticion del usuario es la siguiente:" />
                    <x-jet-label type="text" name="peticion" class="w-full text-xs " value="{{ $id->peticion }}"/>
                    <x-jet-input-error for='peticion' />
                </div>
                <div class="form-group">
                    <x-jet-label value="*Respuesta de la peticion del usuario:" />
                    <x-jet-label type="text" name="peticion" class="w-full text-xs " value="{{ $id->respuesta }}"/>
                    <x-jet-input-error for='peticion' />
                </div>
                <div class="form-group">
                    <x-jet-label value="*Estatus de la peticion del usuario:" />
                    <x-jet-label type="text" name="peticion" class="w-full text-xs " value="{{ $id->status }}"/>
                    <x-jet-input-error for='peticion' />
                </div>
            </div>
                   
            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('peticion.create')}}" class="btn btn-blue mb-2">
                <i class="fas fa-share-square"></i>&nbsp;&nbsp; Contestar peticion
                </a>
                <a href="{{ route('admin.index')}}" class="btn btn-green mb-2">
                    <i class="fas fa-home fa-2x"></i>&nbsp;&nbsp; Menu principal
                </a>
                <a href="{{ route('peticion.respuesta')}}">
                <button class="btn btn-yellow mb-2">
                <i class="fas fa-wrench fa-spin"></i>&nbsp; &nbsp; Respuesta a la peticion
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