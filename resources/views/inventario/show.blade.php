@extends('adminlte::page')

@section('title', 'INVENTARIO')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-plus-circle"></i>&nbsp; Ver inventario del equipo</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Ver inventario
            </h5>
        </div>
        @method('PUT')
        @csrf
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">

                <div class="form-group">
                    <x-jet-label value="* Cliente" />
                    <x-jet-label type="text" name="name" class="w-full text-xs " value="{{ Auth::inventarios()->name }}"/>
                    <x-jet-input-error for='seller_name' />
                </div>

                <div class="form-group">
                    <x-jet-label value="* Servicio" />
                    
                    <x-jet-input-error for='seller_name' />
                </div>

                <div class="form-group">
                    <x-jet-label value="* Monitor" />
                   
                    <x-jet-input-error for='monitor' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Teclado" />
                    
                    <x-jet-input-error for='teclado' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Mouse" />
                    
                    <x-jet-input-error for='mouse' />
                </div>
                <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Fecha del servicio" />
                   
                    <x-jet-input-error for='mouse' />
                </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Equipo" />
                    {!! Form::select('roles[]',$roles,[], ['class'=>'label w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='roles' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Tipo de uso" />
                    {!! Form::select('zones[]',$zones,[], ['class'=>'label w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='zones' />
                </div>
            </div>
            
            <div class="col-12 text-right p-2 gap-2">
                
                <a href="{{ route('users.index')}}" class="btn btn-green mb-2">
                    <i class="fas fa-home fa-2x"></i>&nbsp;&nbsp; Menu principal
                </a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop