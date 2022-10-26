@extends('adminlte::page')

@section('title', 'CONFIGURACIONES')

@section('content_header')
    <h1 class="font-bold"><i class="fa-solid fa-cogs"></i>&nbsp; CONFIGURACIONES</h1>
@stop

@section('content')
    <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="col-sm-12 text-right">
                @can('CREAR CONFIGURACIONES')
                <a href="{{ route('settings.create')}}" class="btn btn-green">
                    <i class="fa-solid fa-plus-circle"></i>&nbsp; Nueva
                </a>
                @endcan
            </div>
            <div class="w-100">&nbsp;</div>
            <div class="col-sm-12 table-responsive">
                <table class="table tablesettings table-striped text-xs font-medium">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Salario Mínimo Z.L.F.N.</th>
                            <th>Salario Mínimo</th>
                            <th>UMA</th>
                            <th>% IVA</th>
                            <th>AÑO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Settings as $row)
                        <tr class="text-center">
                            <td>{{$row->id}}</td>
                            <td>$ {{$row->minimum_salary_zlfn}}</td>
                            <td>$ {{$row->minimum_salary}}</td>
                            <td>$ {{$row->uma}}</td>
                            <td>{{$row->iva}} %</td>
                            <td>{{$row->year_application}}</td>
                            <td class="w-5">
                                <div class="row">
                                    <div class="col-6 text-center w-10">
                                        @can('EDITAR CONFIGURACIONES')
                                        <a href="{{ route('settings.edit', $row->id)}}">
                                            <i class="fa-solid fa-edit btn btn-blue w-9 h-9"></i></span>
                                        </a>
                                        @endcan
                                    </div>
                                    <div class="col-6 text-center w-10">
                                        @can('BORRAR CONFIGURACIONES')
                                        <form class="DeleteReg" action="{{ route('settings.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-red h-9 w-9">
                                                <i class="fa-solid fa-trash items-center"></i>
                                            </button>
                                        </form>
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
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tablecatalogosettings.js') }}"></script>

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