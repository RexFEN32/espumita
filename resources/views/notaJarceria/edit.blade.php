@extends('adminlte::page')

@section('title', 'Jarceria')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-plus-circle"></i>&nbsp; Editar Nota de Jarceria</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Editar Nota de Jarceria
            </h5>
        </div>
        {!! Form::open(['method'=>'PUT','route'=>['notaJarceria.update',$usuarios->id]]) !!}
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
            <div class="form-group">
                            <x-jet-label value="* Cliente" />
                            <select class="form-capture  w-full text-xs uppercase" name="name" id='name'>
                                    @foreach ($Clientes as $id)
                                        <option value="{{$id->name}}" @if ($id->name == old('name')) selected @endif > {{$id->name}}---{{$id->number}}</option>
                                    @endforeach
                            </select>
                            <x-jet-input-error for='name' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Vendedor" />
                            <select class="form-capture  w-full text-xs uppercase" name="vendedor" id='name'>
                                    @foreach ($Vendedores as $vendedor)
                                        <option value="{{$vendedor->id}}" @if ($vendedor->id == old('vendedor')) selected @endif > {{$vendedor->name}}</option> -->
                                    @endforeach
                            </select>
                            <x-jet-input-error for='vendedor' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Zona" />
                            <select class="form-capture  w-full text-xs uppercase" name="zones" id='zones'>
                            @foreach ($zones as $id)
                                        <option value="{{$id->zones}}" @if ($id->vendedor == old('zones')) selected @endif > {{$id->zone}}</option>
                                    @endforeach
                            </select>
                            <x-jet-input-error for='zona' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Clasificacion" />
                            <select class="form-capture  w-full text-xs uppercase" name="clasificacion" id='clasificacion'>
                            @foreach ($clasificacion as $id)
                                        <option value="{{$id->clasificacion}}" @if ($id->vendedor == old('clasificacion')) selected @endif > {{$id->clasificacion}}</option>
                            @endforeach
                            </select>
                            <x-jet-input-error for='clasificacion' />
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Fecha de entrega" />
                    {!! Form::text('fecha_entrega',old('fecha_entrega'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='fecha_entrega' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Anticipo" />
                    {!! Form::text('anticipo',old('anticipo'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='anticipo' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Descripcion" />
                    {!! Form::text('descripcion',old('descripcion'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='descripcion' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Cantidad" />
                    {!! Form::text('cantidad',old('cantidad'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='cantidad' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Precio" />
                    {!! Form::text('precio',old('precio'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='precio' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Importe" />
                    {!! Form::text('importe',old('importe'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='importe' />
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">                
                <a href="{{ route('notaJarceria.index')}}" class="btn btn-green mb-2">
                    <i class="fas fa-home fa-2x"></i>&nbsp;&nbsp; Menu principal
                </a>
                <button type="submit" class="btn btn-blue mb-2">
                    <i class="fas fa-arrow-up fa-2x"></i>&nbsp; &nbsp; Guardar
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop