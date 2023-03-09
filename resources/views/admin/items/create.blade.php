@extends('adminlte::page')

@section('title', 'PARTIDAS')

@section('content_header')
    <h1 class="font-bold"><i class="fa-brands fa-buffer"></i>&nbsp; Partida</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Agregar Partida:
            </h5>
        </div>
        <form action="{{ route('temp_items.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-jet-input type="hidden" name="temp_internal_order_id" value="{{ $TempInternalOrders }}"/>
        <x-jet-input type="hidden" name="item" value="{{ $Item }}"/>
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-12 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <x-jet-label value="* Cantidad" />
                                <x-jet-input type="number" name="amount" class="w-full text-xs" value="{{old('amount')}}"/>
                                <x-jet-input-error for='amount' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Unidad" />
                                {{--  <x-jet-input type="text" name="unit" class="w-full text-xs" value="{{old('unit')}}"/>  --}}
                                <select class="form-capture  w-full text-xs uppercase" name="unit">
                                    @foreach ($Units as $row)
                                        <option value="{{$row->unit}}" @if ($row->id == old('unit')) selected @endif >{{$row->unit}}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for='unit' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Familia" />
                                {{--  <x-jet-input type="text" name="family" class="w-full text-xs" value="{{old('family')}}"/>  --}}
                                <select class="form-capture  w-full text-xs uppercase" name="family">
                                    @foreach ($Families as $row)
                                        <option value="{{$row->family}}" @if ($row->id == old('family')) selected @endif >{{$row->family}}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for='family' /> 
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Clave" />
                                <x-jet-input type="text" name="code" class="w-full text-xs" value="{{old('code')}}" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                <x-jet-input-error for='code' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Fabricación" />
                                <x-jet-input type="text" name="fab" class="w-full text-xs" value="{{old('fab')}}" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                <x-jet-input-error for='fab' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Racks" />
                                <x-jet-input type="text" name="racks" class="w-full text-xs" value="{{old('racks')}}" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                <x-jet-input-error for='racks' /> 
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* SKU" />
                                <x-jet-input type="text" name="sku" class="w-full text-xs" value="{{old('sku')}}" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                <x-jet-input-error for='sku' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Descripción" />
                                <textarea rows="4" name="description" class="w-full text-xs inputjet" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
                                <x-jet-input-error for='description' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Precio Unitario" />
                                <x-jet-input type="number" step="0.01" name="unit_price" id="input-price" class="form-control just-number price-format-input" class="w-full text-xs" value="{{old('unit_price')}}"/>
                                <x-jet-input-error for='unit_price' />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                {{--  <a href="{{ route('customers.index')}}" class="btn btn-black mb-2">
                    <i class="fas fa-times fa-2x"></i>&nbsp;&nbsp; Cancelar
                </a>  --}}
                <button type="submit" class="btn btn-green mb-2">
                    <i class="fas fa-save fa-2x"></i>&nbsp; &nbsp; Guardar
                </button>
            </div>
        </div>
        </form>
    </div>
@stop

@section('css')
    
@stop

@section('js')
<script>
$(document).on("keypress", ".just-number", function (e) {
  let charCode = (e.which) ? e.which : e.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
});
$(document).on('keyup', '.price-format-input', function (e) {
  let val = this.value;
  val = val.replace(/,/g, "");
  if (val.length > 3) {
    let noCommas = Math.ceil(val.length / 3) - 1;
    let remain = val.length - (noCommas * 3);
    let newVal = [];
    for (let i = 0; i < noCommas; i++) {
      newVal.unshift(val.substr(val.length - (i * 3) - 3, 3));
    }
    newVal.unshift(val.substr(0, remain));
    this.value = newVal;
  }
  else {
    this.value = val;
  }
});

$(document).ready(function(){
  $('#input-price').focus();
})</script>
@stop