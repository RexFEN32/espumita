@extends('adminlte::page')

@section('title', 'LAVANDEREIA')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-plus-circle"></i>&nbsp; Crear nota de Lavanderia</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Agregar Datos
                    <a href="{{ route('clientes.create')}}" class="btn btn-pink mb-2" style="float: right; background-color: pink;">
                        <i class="fas fa-cat fa-2x"></i>&nbsp;&nbsp; Agregar cliente
                    </a>
            </h5>
        </div>
        {!! Form::open(['method'=>'POST','route'=>['lavanderia.store']]) !!}
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-6 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h5 text-center fw">Datos Generales</h1>
                        </div>                          
                        <div class="card-body">
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
                                        <option value="{{$id->clasificacion}}" @if ($id->vendedor == old('clasification')) selected @endif > {{$id->name}}</option>
                            @endforeach
                            </select>
                            <x-jet-input-error for='clasification' />
            </div>
            <div class="form-group">
                    <label id="fecha_entrega" class="inputjet w-full text-xs uppercase" >* Fecha de entrega - Fecha actual (<span id="fecha_actual"></span>)</label>                    
                    {!! Form::text('fecha_entrega',old('fecha_entrega'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='fecha_entrega' />
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Descripcion" />
                    {!! Form::text('descripcion',old('descripcion'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='descripcion' />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xs-12 shadow rounded-xl p4">
    <div class="card">
                        <div class="card-header">
                            <h1 class="h5 text-center fw">Factura</h1>
                        </div>
        <div class="card-body">
            
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Anticipo" />
                    {!! Form::text('anticipo',old('anticipo'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='anticipo' />
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
                    <x-jet-label value="* Precio individual" />
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
                </div>         
            </div>
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
<script>
    // Obtén el elemento label por su ID
    var fechaEntregaLabel = document.getElementById("fecha_entrega");
    // Obtén el elemento span por su ID
    var fechaActualSpan = document.getElementById("fecha_actual");
    // Obtén la fecha actual en el formato deseado
    var fechaActual = new Date().toISOString().split('T')[0]; // Formato YYYY-MM-DD
    // Establece la fecha actual en el elemento span
    fechaActualSpan.textContent = fechaActual;
</script>
@stop