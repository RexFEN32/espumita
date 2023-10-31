@extends('adminlte::page')

@section('title', 'USUARIOS')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp;Informacion del Cliente-C</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-edit"></i>&nbsp; Ingresar informacion del Cliente
            </h5>
        </div>
        @method('PUT')
        @csrf
        {!! Form::open(['method'=>'POST','route'=>['clientes.store']]) !!}
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-6 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h5 text-center fw">Datos Generales del Cliente</h1>
                        </div>
                        @foreach ($usuarios as $id)
                        @endforeach   
                        <div class="card-body">
                            <div class="form-group">
                                <x-jet-label value="* Nombre" />
                                {!! Form::text('name',old('name'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                                <x-jet-input-error for='name' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Teléfono fijo" />
                                {!! Form::text('numero_fijo',old('numero_fijo'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                                <x-jet-input-error for='numero_fijo' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Teléfono Móvil" />
                                {!! Form::text('number',old('number'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                                <x-jet-input-error for='number' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Email" />
                                {!! Form::text('email',old('email'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                                <x-jet-input-error for='email' />
                            </div>
                            <div class="form-group">
                            <x-jet-label value="* Zona" />
                                    <select class="form-capture  w-full text-xs uppercase" name="zone" id='zone'>
                                    @foreach ($zones as $id)
                                            <option value="{{$id->zone}}" @if ($id->vendedor == old('zones')) selected @endif > {{$id->zone}}</option>
                                    @endforeach
                            </select>
                            <x-jet-input-error for='zona' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Numero de Tarjeta" />
                                {!! Form::text('numero_tarjeta',old('numero_tarjeta'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                            <x-jet-input-error for='numero_tarjeta' />
                            </div>
                        </div>
                    </div>
                </div>
                
                            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('clientes.index')}}" class="btn btn-green mb-2">
                    <i class="fas fa-home fa-2x"></i>&nbsp;&nbsp; Home
                </a>
                <button type="submit" class="btn btn-blue mb-2">
                    <i class="fas fa-arrow-up fa-2x"></i>&nbsp; &nbsp; Cargar informacion
                </button>
        </div>
@stop