@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-eye"></i>&nbsp;axel vista <i class="fab fa-twitter"></i></h1>
@stop

@section('content')
<div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="row p-4">
                <div class="col-sm-12 text-center font-bold text-lg">
                
            
               
                <div class="col-sm-12 table-responsive">

                
            </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    
@stop

@section('js')
<script>

$(document).ready(function () {
    $('#tableContraportada').DataTable();
});
</script>


@stop