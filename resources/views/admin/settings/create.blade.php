@extends('adminlte::page')

@section('title', 'CONFIGURACIÓN')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users-cog"></i>&nbsp; Configuración</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Agregar Configuración:
            </h5>
        </div>
        <form action="{{ route('settings.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-12 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h5 text-center fw">Datos Generales</h1>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <x-jet-label value="* Salario Mínimo Zona Libre de la Frontera Norte" />
                                <x-jet-input type="number" step="0.01" name="minimum_salary_zlfn" class="w-full text-xs " value="{{old('minimum_salary_zlfn')}}"/>
                                <x-jet-input-error for='minimum_salary_zlfn' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Salario Mínimo Resto del País" />
                                <x-jet-input type="number" step="0.01" name="minimum_salary" class="w-full text-xs " value="{{old('minimum_salary')}}"/>
                                <x-jet-input-error for='minimum_salary' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* UMA" />
                                <x-jet-input type="number" step="0.01" name="uma" class="w-full text-xs " value="{{old('uma')}}"/>
                                <x-jet-input-error for='uma' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* I.V.A." />
                                <x-jet-input type="number" name="iva" class="w-full text-xs " value="{{old('iva')}}"/>
                                <x-jet-input-error for='iva' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* AÑO DE APLICACIÓN" />
                                <x-jet-input type="number" name="year_application" class="w-full text-xs " value="{{old('year_application')}}"/>
                                <x-jet-input-error for='year_application' />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('settings.index')}}" class="btn btn-black mb-2">
                    <i class="fas fa-times fa-2x"></i>&nbsp;&nbsp; Cancelar
                </a>
                <button type="submit" class="btn btn-green mb-2">
                    <i class="fas fa-save fa-2x"></i>&nbsp; &nbsp; Guardar
                </button>
            </div>
        </div>
        </form>
    </div>
@stop

@section('css')
    
@stop

@section('js')

@stop