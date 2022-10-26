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
        <form action="{{ route('internal_orders.shipment')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-jet-input type="hidden" name="customer_id" value="{{ $Customers->id }}"/>
        <x-jet-input type="hidden" name="temp_internal_order_id" value="{{ $TempInternalOrders->id }}"/>
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-12 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <x-jet-label value="* Entrega del Pedido" />
                                        <x-jet-input type="date" name="date_delivery" required class="w-full text-xs" value="{{ old('date_delivery') }}"/>
                                        <x-jet-input-error for='date_delivery' />
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <x-jet-label value="* Entrega de la Instalación" />
                                        <x-jet-input type="date" name="instalation_date" required class="w-full text-xs" value="{{ old('instalation_date') }}"/>
                                        <x-jet-input-error for='instalation_date' />
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <x-jet-label value="* Tipo de Moneda" />
                                        <select class="form-capture  w-full text-xs uppercase" required name="coin_id">
                                            @foreach ($Coins as $row)
                                                <option value="{{$row->id}}" @if ($row->id == old('coin_id')) selected @endif >{{$row->coin}}</option>
                                            @endforeach
                                        </select>
                                        <x-jet-input-error for='coin_id' />
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <x-jet-label value="* Condiciones de Pago" />
                                        <select class="form-capture  w-full text-xs uppercase" required name="payment_conditions">
                                            <option value="1 PAGO">1 PAGO</option>
                                            <option value="2 PAGOS">2 PAGOS</option>
                                            <option value="3 PAGOS">3 PAGOS</option>
                                            <option value="4 PAGOS">4 PAGOS</option>
                                            <option value="5 PAGOS">5 PAGOS</option>
                                            <option value="6 PAGOS">6 PAGOS</option>
                                            <option value="7 PAGOS">7 PAGOS</option>
                                            <option value="8 PAGOS">8 PAGOS</option>
                                            <option value="9 PAGOS">9 PAGOS</option>
                                            <option value="10 PAGOS">10 PAGOS</option>
                                            <option value="11 PAGOS">11 PAGOS</option>
                                            <option value="12 PAGOS">12 PAGOS</option>
                                            <option value="13 PAGOS">13 PAGOS</option>
                                            <option value="14 PAGOS">14 PAGOS</option>
                                            <option value="15 PAGOS">15 PAGOS</option>
                                            <option value="16 PAGOS">16 PAGOS</option>
                                            <option value="17 PAGOS">17 PAGOS</option>
                                            <option value="18 PAGOS">18 PAGOS</option>
                                            <option value="19 PAGOS">19 PAGOS</option>
                                            <option value="20 PAGOS">20 PAGOS</option>
                                            <option value="21 PAGOS">21 PAGOS</option>
                                            <option value="22 PAGOS">22 PAGOS</option>
                                            <option value="23 PAGOS">23 PAGOS</option>
                                            <option value="24 PAGOS">24 PAGOS</option>
                                            <option value="25 PAGOS">25 PAGOS</option>
                                            <option value="26 PAGOS">26 PAGOS</option>
                                            <option value="27 PAGOS">27 PAGOS</option>
                                            <option value="28 PAGOS">28 PAGOS</option>
                                            <option value="29 PAGOS">29 PAGOS</option>
                                            <option value="30 PAGOS">30 PAGOS</option>
                                            <option value="31 PAGOS">31 PAGOS</option>
                                            <option value="32 PAGOS">32 PAGOS</option>
                                            <option value="33 PAGOS">33 PAGOS</option>
                                            <option value="34 PAGOS">34 PAGOS</option>
                                            <option value="35 PAGOS">35 PAGOS</option>
                                        </select>
                                        <x-jet-input-error for='payment_conditions' />
                                    </div>
                                </div>
                            </div>
                            <div class="w-100">&nbsp;</div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <x-jet-label value="* Vendedor" />
                                        <select class="form-capture  w-full text-xs uppercase" name="seller_id">
                                            @foreach ($Sellers as $row)
                                                <option value="{{$row->id}}" @if ($row->id == old('seller_id')) selected @endif >{{$row->seller_name}}</option>
                                            @endforeach
                                        </select>
                                        <x-jet-input-error for='seller_id' />
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                {{--  <a href="{{ route('internal_orders.index')}}" class="btn btn-black mb-2">
                    <i class="fa-solid fa-times fa-2x"></i>&nbsp;&nbsp; Cancelar
                </a>  --}}
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
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tableshipping_addresses.js') }}"></script>
<script type="text/javascript">
    function unselect() {
        document.querySelectorAll('[name=shipping_address').forEach((x) => x.checked = false);
    }
</script>

{{--  <script>
    $(document).ready(function()
    {
        $(".shipment_option").click(function(evento)
        {      
            var valor = $(this).val();
          
            if(valor == 'Sí')
            {
                $("#shipment_answer").css("display", "block");
            }else
            {
                $("#shipment_answer").css("display", "none");
            }
        });
    });
</script>  --}}
@stop