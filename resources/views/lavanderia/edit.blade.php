@extends('adminlte::page')

@section('title', 'lavanderiaES')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-plus-circle"></i>&nbsp; Editar Nota de Lavanderia</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Editar Nota de Lavanderia
            </h5>
        </div>
        {!! Form::open(['method'=>'PUT','route'=>['lavanderia.update',$usuarios->id]]) !!}
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            
            <div class="form-group">
                            <x-jet-label value="* Cliente" />
                            <select class="form-capture  w-full text-xs uppercase" name="name" id='name'>
                                    @foreach ($Clientes as $cliente)
                                        <option value="{{$cliente->name}}" @if ($cliente->name == old('name')) selected @endif > {{$cliente->name}}---{{$cliente->number}}</option>
                                        {{--Esta es la opcion que guarda el ID <option value="{{$cliente->id}}" @if ($cliente->id == old('name')) selected @endif > {{$cliente->name}}---{{$cliente->number}}</option> --}}
                                        @endforeach
                            </select>
                            <x-jet-input-error for='name' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Vendedor" />
                            <select class="form-capture  w-full text-xs uppercase" name="vendedor" id='vendedor'>
                                    @foreach ($Vendedores as $vendedor)
                                        <option value="{{$vendedor->name}}" @if ($vendedor->id == old('vendedor')) selected @endif > {{$vendedor->name}}</option>
                                    {{-- <option value="{{$vendedor->id}}" @if ($vendedor->id == old('vendedor')) selected @endif > {{$vendedor->name}}</option> --}}
                                    @endforeach
                            </select>
                            <x-jet-input-error for='vendedor' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Zona" />
                            <select class="form-capture  w-full text-xs uppercase" name="zone" id='zone'>
                            @foreach ($zones as $id)
                                        <option value="{{$id->zone}}" @if ($id->vendedor == old('zone')) selected @endif > {{$id->zone}}</option>
                                    @endforeach
                            </select>
                            <x-jet-input-error for='zona' />
            </div>
            <div class="form-group">
                            <x-jet-label value="* Clasificacion" />
                            <select class="form-capture  w-full text-xs uppercase" name="clasification" id='clasification'>
                            @foreach ($clasificacion as $id)
                                        <option value="{{$id->clasificacion}}" @if ($id->vendedor == old('clasification')) selected @endif > {{$id->clasificacion}}</option>
                            @endforeach
                            </select>
                            <x-jet-input-error for='clasification' />
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Fecha de entrega (A-M-D)" />
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
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Servicio" />
                    {!! Form::text('servicio',old('servicio'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='servicio' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Impuesto 1" />
                    {!! Form::text('impuesto1',old('impuesto1'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='impuesto1' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Impuesto 2" />
                    {!! Form::text('impuesto2',old('impuesto2'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='impuesto2' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Descuento" />
                    {!! Form::text('descuento',old('descuento'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='descuento' />
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('lavanderia.index')}}" class="btn btn-red mb-2">
                    <i class="fas fa-times fa-2x"></i>&nbsp;&nbsp; Cancelar
                </a>
                <button type="submit" class="btn btn-green mb-2">
                    <i class="fas fa-save fa-2x"></i>&nbsp; &nbsp; Guardar
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