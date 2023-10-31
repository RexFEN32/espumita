@extends('adminlte::page')

@section('title', 'USUARIOS')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp;Informacion del Usuario</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-edit"></i>&nbsp; Ver informacion del usuario
            </h5>
        </div>
            @method('PUT')
        @csrf
        
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-6 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h5 text-center fw">Datos Generales del Usuario</h1>
                        </div>
                                                
                        <div class="card-body">
                            <div class="form-group">
                                <x-jet-label value="* Nombre" />
                                <x-jet-label type="text" name="seller_name" class="w-full text-xs " value="{{ Auth::user()->name}}"/>
                                <x-jet-input-error for='seller_name' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Teléfono Móvil" />
                                <x-jet-label type="text" name="seller_mobile" class="w-full text-xs " value="{{ Auth::user()->number}}"/>
                                <x-jet-input-error for='seller_mobile' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Email personal" />
                                <x-jet-label type="text" name="seller_email" class="w-full text-xs " value="{{ Auth::user()->email }}"/>
                                <x-jet-input-error for='seller_email' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Rol" />
                                {!! Form::select('roles[]', $roles, ['class'=>'label w-full text-xs uppercase']) !!}
                            <x-jet-input-error for='roles' />
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
                                <x-jet-label value="* Teléfono de Oficina" />
                                <x-jet-label type="text" name="seller_office_phone" class="w-full text-xs " value="{{ Auth::user()->number_office }}"/>
                                <x-jet-input-error for='seller_office_phone' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="Extención Teléfono de Oficina" />
                                <x-jet-label type="text" name="seller_office_phone_ext" class="w-full text-xs " value="{{ Auth::user()->extension }}"/>
                                <x-jet-input-error for='seller_office_phone_ext' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="Departamento" />
                                <x-jet-label type="text" name="departament" class="w-full text-xs " value="{{ Auth::user()->departament }}"/>
                                <x-jet-input-error for='departament' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="Email corporativo" />
                                <x-jet-label type="text" name="email_corp" class="w-full text-xs " value="{{ Auth::user()->email_corp }}"/>
                                <x-jet-input-error for='email_corp' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="ID" />
                                <x-jet-label type="text" name="id" class="w-full text-xs " value="{{ Auth::user()->id }}"/>
                                <x-jet-input-error for='id' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="Monitor" />
                                <x-jet-label type="text" name="monitor" class="w-full text-xs " value="{{ Auth::user()->monitor }}"/>
                                <x-jet-input-error for='monitor' />
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