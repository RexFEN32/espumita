@extends('adminlte::page')

@section('title', 'USUARIOS')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp;Editar Informacion del Cliente</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-edit"></i>&nbsp; Editar informacion del cliente
            </h5>
        </div>
        {!! Form::open(['method'=>'PUT','route'=>['clientes.update',$usuarios->id]]) !!}
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-6 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h5 text-center fw">Datos Generales del Cliente</h1>
                        </div>
                        <input type="hidden" name="id" value="{{$usuarios->id}}"/>               
                        <div class="card-body">
                            <div class="form-group">
                                <x-jet-label value="* Nombre" />
                                <x-jet-input type="text" name="name" class="w-full text-xs " value="{{ $usuarios->name }}"/>
                                <x-jet-input-error for='name' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Teléfono Móvil" />
                                <x-jet-input type="text" name="number" class="w-full text-xs " value="{{ $usuarios->number }}"/>
                                <x-jet-input-error for='number' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Teléfono fijo" />
                                <x-jet-input type="text" name="numero_fijo" class="w-full text-xs " value="{{ $usuarios->numero_fijo }}"/>
                                <x-jet-input-error for='numero_fijo' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Email personal" />
                                <x-jet-input type="text" name="email" class="w-full text-xs " value="{{ $usuarios->email }}"/>
                                <x-jet-input-error for='email' />
                            </div> 
                            <x-jet-label value="* Zona" />
                                    <select class="form-capture  w-full text-xs uppercase" name="zones" id='zones'>
                                    @foreach ($zones as $id)
                                            <option value="{{$id->zone}}" @if ($id->vendedor == old('zone')) selected @endif > {{$id->zone}}</option>
                                    @endforeach
                            </select>
                            <div class="form-group">
                                <x-jet-label value="* Numero de tarjeta" />
                                <x-jet-input type="text" name="numero_tarjeta" class="w-full text-xs " value="{{ $usuarios->numero_tarjeta }}"/>
                                <x-jet-input-error for='numero_tarjeta' />
                            </div> 
                        </div>
                    </div>
                </div>        
            </div>
        </div>
    </div>
        <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('clientes.index')}}" class="btn btn-green mb-2">
                    <i class="fas fa-home fa-2x"></i>&nbsp;&nbsp; Home
                </a>
                <button type="submit" class="btn btn-blue mb-2">
                    <i class="fas fa-arrow-up fa-2x"></i>&nbsp; &nbsp; Guardar
                </button>
        </div>
@stop