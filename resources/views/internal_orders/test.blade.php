@extends('adminlte::page')

@section('title', 'PEDIDO INTERNO')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-clipboard-check"></i>&nbsp; PEDIDO INTERNO</h1>
@stop

@section('content')
    <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
     {{$signature}} 
    {{$internal_order}}
    <br><br>
    {{$stored_key}}

    <span class="badge badge-primary">{{$key_code}}</span>
    <br>
    <br>
    {{$isPasswordCorrect}}
    
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')

@stop