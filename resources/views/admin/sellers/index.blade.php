@extends('adminlte::page')

@section('title', 'VENDEDORES')

@section('content_header')
    <h1 class="font-bold"><i class="fa-solid fa-users-cog"></i>&nbsp; VENDEDORES</h1>
@stop

@section('content')
    <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="col-sm-12 text-right">
                @can('CREAR VENDEDORES')
                <a href="{{ route('sellers.create')}}" class="btn btn-green">
                    <i class="fa-solid fa-plus-circle"></i>&nbsp; Nuevo
                </a>
                @endcan
            </div>
            <div class="w-100">&nbsp;</div>
            <div class="col-sm-12 table-responsive">
                <table class="table tablesellers table-striped text-xs font-medium">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Móviil</th>
                            <th>Tel. Of.</th>
                            <th>Ext.</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Municipio</th>
                            <th>Colonia</th>
                            <th>Calle</th>
                            <th>Exterior</th>
                            <th>Interior</th>
                            <th>CP</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Sellers as $row)
                        <tr class="text-center">
                            <td>{{$row->id}}</td>
                            <td>{{$row->seller_name}}</td>
                            <td>{{$row->seller_mobile}}</td>
                            <td>{{$row->seller_office_phone}}</td>
                            <td>{{$row->seller_office_phone_ext}}</td>
                            <td>{{$row->seller_email}}</td>
                            <td>{{$row->seller_state}}</td>
                            <td>{{$row->seller_city}}</td>
                            <td>{{$row->seller_suburb}}</td>
                            <td>{{$row->seller_street}}</td>
                            <td>{{$row->seller_outdoor}}</td>
                            <td>{{$row->seller_intdoor}}</td>
                            <td>{{$row->seller_zip_code}}</td>
                            <td class="w-10">
                                <div class="row">
                                    <div class="col-6 text-center w-10">
                                        @can('EDITAR VENDEDORES')
                                        <a href="{{ route('sellers.edit', $row->id)}}">
                                            <i class="fa-solid fa-edit btn btn-blue w-9 h-9"></i></span>
                                        </a>
                                        @endcan
                                    </div>
                                    <div class="col-6 text-center w-10">
                                        @can('BORRAR VENDEDORES')
                                        <form class="DeleteReg" action="{{ route('sellers.destroy', $row->id) }}" method="POST">
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
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tablecatalogosellers.js') }}"></script>

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