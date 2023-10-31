@extends('adminlte::page')

@section('title', 'Gestion DE ENCARGADOS')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp;Administracion de Encargados</h1>
@stop

@section('content')
    <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="col-sm-12 text-right">
                @can('CREAR ENCARGADO')
                <a href="{{ route('encargados.create')}}" class="btn btn-green">
                    <i class="fas fa-plus-circle"></i>&nbsp; Agregar Encargado
                </a>
                @endcan
            </div>
            <div class="w-100">&nbsp;</div>
            <div class="col-sm-12 table-responsive">
                <table class="table tableusuarios table-striped">
                    <thead>
                        <tr>
                            <th>Numero de Encargado</th>
                            <th>Encargado</th>
                            <th>Numero</th>
                            <th>Editar Encargado</th>
                            <th>Eliminar Encargado</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->nombre}}</td>
                            <td>{{$row->numero}}</td>
                            <td class="w-20">
                                <div class="row">
                                    <div class="col-6 text-center w-10">
                                        @can('EDITAR ENCARGADO')
                                            <a href="{{ route('encargados.edit', $row->id)}}">
                                            <button class="btn" style="background-color:#FF1493">
                                                <i class="fas fa-xl fa-edit   "></i>
                                                </button>
                                            </a>
                                        @endcan
                                    </div>
                                    </td>
                                    <td>
                                    <div class="col-6 text-center w-10">
                                        @can('BORRAR NOTA')
                                        {!! Form::open(['method'=>'DELETE','route'=>['encargados.destroy', $row->id], 'class'=>'DeleteReg' ]) !!}
                                            {!! Form::button('<i class="fa fa-trash items-center fa-xl"></i>', ['class' => 'btn btn-red ', 'type' => 'submit']) !!}
                                        {!! Form::close() !!}
                                        @endcan
                                    </div>
                                </div>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tablecatalogousers.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/alert_delete_reg.js') }}"></script>

@if (session('create_reg') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/confirm_create_reg.js') }}"></script>
@endif

@if (session('eliminar') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/confirm_delete_reg.js') }}"></script>
@endif

@if (session('error_delete') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/error_delete_reg.js') }}"></script>
@endif

@if (session('update_reg') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/update_reg.js') }}"></script>
@endif
@stop