@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp;Informacion del Cliente</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-edit"></i>&nbsp; Ver informacion del cliente
            </h5>
        </div>
            @method('PUT')
        @csrf
        
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-6 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h5 text-center fw">Datos Generales del Cliente</h1>
                        </div>
                                                
                        <div class="card-body">
                            <div class="form-group">
                                <x-jet-label value="* Nombre" />
                                <x-jet-label type="text" name="name" class="w-full text-xs " value="{{$clientes->name}}"/>
                                <x-jet-input-error for='name' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Teléfono Móvil" />
                                <x-jet-label type="text" name="number" class="w-full text-xs " value="{{ $clientes->number}}"/>
                                <x-jet-input-error for='number' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Email personal" />
                                <x-jet-label type="text" name="email" class="w-full text-xs " value="{{ $clientes->email }}"/>
                                <x-jet-input-error for='email' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Zona" />
                                <x-jet-label type="text" name="seller_office_phone" class="w-full text-xs " value="{{ $clientes->zone }}"/>
                            <x-jet-input-error for='zone' />
                </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h5 text-center fw">Datos en la empresa</h1>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <div class="form-group">
                                <x-jet-label value="* Teléfono Fijo" />
                                <x-jet-label type="text" name="seller_office_phone" class="w-full text-xs " value="{{ $clientes->numero_fijo }}"/>
                                <x-jet-input-error for='seller_office_phone' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="Numero de tarjeta" />
                                <x-jet-label type="text" name="seller_office_phone_ext" class="w-full text-xs " value="{{ $clientes->numero_tarjeta }}"/>
                                <x-jet-input-error for='seller_office_phone_ext' />
                            </div>
                            
                            
                            <div class="form-group">
                                <x-jet-label value="ID" />
                                <x-jet-label type="text" name="id" class="w-full text-xs " value="{{ $clientes->id }}"/>
                                <x-jet-input-error for='id' />
                            </div>
                            
                    </div>
                </div>         
            </div>
        </div>
    </div>
    
        <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('users.index')}}" class="btn btn-green mb-2">
                    <i class="fas fa-home fa-2x"></i>&nbsp;&nbsp; Menu principal
                </a>
                
        </div>
@stop