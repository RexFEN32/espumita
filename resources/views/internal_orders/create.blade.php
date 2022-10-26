@extends('adminlte::page')

@section('title', 'PEDIDO INTERNO')

@section('content_header')
    <h1 class="font-bold"><i class="fa-solid fa-clipboard-check"></i>&nbsp; Pedido Interno</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fa-solid fa-plus-circle"></i>&nbsp; Agregar Pedido Interno:
            </h5>
        </div>
        <form action="{{ route('internal_orders.capture') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-12 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <x-jet-label value="* Cliente" />
                                        <select class="form-capture  w-full text-xs uppercase" name="customer_id">
                                            @foreach ($Customers as $row)
                                                <option value="{{$row->id}}" @if ($row->id == old('customer_id')) selected @endif >{{$row->customer}}</option>
                                            @endforeach
                                        </select>
                                        <x-jet-input-error for='customer_id' />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('internal_orders.index')}}" class="btn btn-black mb-2">
                    <i class="fa-solid fa-times fa-2x"></i>&nbsp;&nbsp; Cancelar
                </a>
                <button type="submit" class="btn btn-green mb-2">
                    <i class="fa-solid fa-save fa-2x"></i>&nbsp; &nbsp; Siguiente
                </button>
            </div>
        </div>
        </form>
    </div>
@stop

@section('css')
    
@stop

@section('js')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tableitems.js') }}"></script>

<script>
    $(document).ready(function(){
        $(".shipment_option").click(function(evento){
          
            var valor = $(this).val();
          
            if(valor == 'Sí'){
                $("#shipment_answer").css("display", "block");
                $("#div2").css("display", "none");
            }else{
                $("#shipment_answer").css("display", "none");
                $("#div2").css("display", "block");
            }
    });
});
</script>

<script>
    $(document).ready(function(){
        $(".shipment_address_equal_option").click(function(evento){
          
            var valor = $(this).val();
          
            if(valor == 'No'){
                $("#shipment_address").css("display", "block");
            }else{
                $("#shipment_address").css("display", "none");
            }
    });
});
</script>
@stop