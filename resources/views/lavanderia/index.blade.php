@extends('adminlte::page')

@section('title', 'Gestion DE VENTAS')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp;Nota de Venta de Lavanderia</h1>
@stop

@section('content')
    <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="col-sm-12 text-right">
                @can('CREAR NOTA')
                <a href="{{ route('lavanderia.create')}}" class="btn btn-green">
                    <i class="fas fa-plus-circle"></i>&nbsp; Nueva Nota de Lavanderia
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
                            <th>Editar Nota</th>
                            <th>Eliminar Nota</th> 
                            <th>Ver Nota</th> 
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach ($lavanderia as $row)                   
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name }}</td>
                            <td class="w-20">
                                <div class="row">
                                    <div class="col-6 text-center w-10">
                                        @can('EDITAR NOTA')
                                            <a href="{{ route('lavanderia.edit', $row->id)}}">
                                                <button class="btn" style="background-color:#FF1493">
                                                    <i class="fas fa-xl fa-edit"></i>
                                                </button>
                                            </a>
                                        @endcan
                                    </div>
                                    </td>
                                    <td>
                                    <div class="col-6 text-center w-10">
                                        @can('BORRAR NOTA')
                                        {!! Form::open(['method'=>'DELETE','route'=>['lavanderia.destroy', $row->id], 'class'=>'DeleteReg' ]) !!}
                                            {!! Form::button('<i class="fa fa-trash items-center fa-xl"></i>', ['class' => 'btn btn-red ', 'type' => 'submit']) !!}
                                        {!! Form::close() !!}
                                        @endcan
                                    </div>
                                    </td>
                                    <td>
                                    <div class="col-6 text-center w-10">
                                        @can('VER NOTA')
                                            <a href="{{ route('lavanderia.show', $row->id)}}">
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
