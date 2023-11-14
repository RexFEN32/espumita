@extends('adminlte::page')

@section('title', 'Gestion DE JARCERIA')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp;Nota de Venta de Jarceria</h1>
@stop

@section('content')
    <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="col-sm-12 text-right">
                @can('CREAR NOTA')
                <a href="{{ route('notaJarceria.create')}}" class="btn btn-green">
                    <i class="fas fa-plus-circle"></i>&nbsp; Nueva Nota de Jarceria
                </a>
                @endcan
            </div>
            <div class="w-100">&nbsp;</div>
            <div class="col-sm-12 table-responsive">
                <table class="table tableusuarios table-striped">
                    <thead>
                        <tr>
                            <th>Numero de Nota</th>
                            <th>Cliente</th>
                            <th>Fecha Promesa</th>
                            <th>Ver Nota</th>
                            <th>Eliminar Nota</th>
                            <th>Editar Nota</th> 
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach ($nota as $row)                   
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->fecha_entrega)->locale('es')->format('d-m-Y') }}</td>
                            <td class="w-20">
                                <div class="row">
                                    <div class="col-6 text-center w-10">
                                        @can('VER NOTA')
                                            <a href="{{ route('notaJarceria.show', $row->id)}}">
                                                <button class="btn" style="background-color:#FF1493">
                                                    <i class="fas fa-xl fa-eye"></i>
                                                </button>
                                            </a>
                                        @endcan
                                    </div>
                            </td>
                            <td>
                                    <div class="col-6 text-center w-10">
                                        @can('BORRAR NOTA')
                                        {!! Form::open(['method'=>'DELETE','route'=>['notaJarceria.destroy', $row->id], 'class'=>'DeleteReg' ]) !!}
                                            {!! Form::button('<i class="fa fa-trash items-center fa-xl"></i>', ['class' => 'btn btn-red ', 'type' => 'submit', 'style' => 'margin-left: 40px;']) !!}
                                        {!! Form::close() !!}
                                        @endcan
                                    </div>
                            </td>
                            <td>
                                    <div class="col-6 text-center w-10">
                                        @can('EDITAR NOTA')
                                            <a href="{{ route('notaJarceria.edit', $row->id)}}">
                                                <button class="btn" style="background-color:#FF1493">
                                                    <i class="fas fa-xl fa-edit"></i>
                                                </button>
                                            </a>
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
