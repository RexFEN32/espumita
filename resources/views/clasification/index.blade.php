@extends('adminlte::page')

@section('title', 'CATALOGO DE CLASIFICACIONES')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp;Catalogo de Clasificaciones</h1>
@stop

@section('content')
    <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="col-sm-12 text-right">
                @can('CREAR CLASIFICACION')
                <a href="{{ route('clasification.create')}}" class="btn btn-green">
                    <i class="fas fa-plus-circle"></i>&nbsp; Nueva Clasificacion
                </a>
                @endcan
            </div>
            <div class="w-100">&nbsp;</div>
            <div class="col-sm-12 table-responsive">
                <table class="table tableusuarios table-striped bg-gray-300">
                    <thead>
                        <tr>
                            <th>Clasificacion</th>
                            <th>Descripcion</th>
                            <th>Eliminar Clasificacion</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>
                                    <div class="col-6 text-center w-10">
                                        @can('BORRAR CLIENTE')
                                        {!! Form::open(['method'=>'DELETE','route'=>['clientes.destroy', $row->id], 'class'=>'DeleteReg' ]) !!}
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