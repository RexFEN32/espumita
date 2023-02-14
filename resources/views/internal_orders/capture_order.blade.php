@extends('adminlte::page')

@section('title', 'PEDIDO INTERNO')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-clipboard-check"></i>&nbsp; Pedido Interno</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Agregar Pedido Interno:
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
                                        <x-jet-label value="* Fecha de Emisión " />
                                        <x-jet-input type="date" name="reg_date" required class="w-full text-xs" value="{{ $hoy->format('Y-m-d') }}"/>
                                        
                                    </div>
                                    </div>
                                <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <x-jet-label value="* Entrega de Equipo" />
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
                                            <option value="1">1 PAGO</option>
                                            <option value="2">2 PAGOS</option>
                                            <option value="3">3 PAGOS</option>
                                            <option value="4">4 PAGOS</option>
                                            <option value="5">5 PAGOS</option>
                                            <option value="6">6 PAGOS</option>
                                            <option value="7">7 PAGOS</option>
                                            <option value="8">8 PAGOS</option>
                                            <option value="9">9 PAGOS</option>
                                            <option value="10">10 PAGOS</option>
                                            <option value="11">11 PAGOS</option>
                                            <option value="12">12 PAGOS</option>
                                            <option value="13">13 PAGOS</option>
                                            <option value="14">14 PAGOS</option>
                                            <option value="15">15 PAGOS</option>
                                            <option value="16">16 PAGOS</option>
                                            <option value="17">17 PAGOS</option>
                                            <option value="18">18 PAGOS</option>
                                            <option value="19">19 PAGOS</option>
                                            <option value="20">20 PAGOS</option>
                                            <option value="21">21 PAGOS</option>
                                            <option value="22">22 PAGOS</option>
                                            <option value="23">23 PAGOS</option>
                                            <option value="24">24 PAGOS</option>
                                            <option value="25">25 PAGOS</option>
                                            <option value="26">26 PAGOS</option>
                                            <option value="27">27 PAGOS</option>
                                            <option value="28">28 PAGOS</option>
                                            <option value="29">29 PAGOS</option>
                                            <option value="30">30 PAGOS</option>
                                            <option value="31">31 PAGOS</option>
                                            <option value="32">32 PAGOS</option>
                                            <option value="33">33 PAGOS</option>
                                            <option value="34">34 PAGOS</option>
                                            <option value="35">35 PAGOS</option>
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
                                    <div class="row">
                                    <div class="col-sm-3 col-xs-12">
                                      <div class="form-group">
                                        <x-jet-label value="* Comision del Vendedor" />
                                        <input  type="number" name="comision" style='width: 60%;'max=1 min=0 step=0.01 value=0> %
                                        <x-jet-input-error for='seller_id' />
                                    </div></div>
                                    <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <x-jet-label value=" % Dgi" />
                                        <input type="number" name="dgi" style='width: 60%;'max=1 min=0 step=0.01 value=0> %
                                        <x-jet-input-error for='seller_id' />
                                    </div></div>
                                    <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <x-jet-label value="Otra" />
                                        <input type="number" name="otra" style='width: 60%;'max=1 min=0 step=0.01 value=0> %
                                        <x-jet-input-error for='seller_id' />
                                    </div></div>
                                    <div class="col-sm-3 col-xs-12">
                                      <div class="form-group">
                                        <x-jet-label value="* Cotización Numero:" />
                                        <input type="text" name="ncotizacion" style='width: 60%;'> 
                                        <x-jet-input-error for='seller_id' />
                                    </div></div>
                                </div>
                                
                                 

                             <h5> Otros Datos</h5>

<div class="form-group">
       <x-jet-label value="Numero de Contrato (opcional)" />
       <input type="text" name="ncontrato" style='width: 10%;'>
       <x-jet-input-error for='seller_id' />
   </div>
   <div class="form-group">
       <x-jet-label value="Orden de Compra" />
       <input type="text" name="oc" style='width: 10%;'>
       <x-jet-input-error for='seller_id' />
   </div> 
   <br>
   <div class="row">
                                    <div class="col-sm-3 col-xs-12">
                                      <div class="form-group">
                                        <x-jet-label value="* IEPS" />
                                        <input type="number" name="ieps" style='width: 60%;' max=1 min=0 step=0.01 value=0> %
                                        <x-jet-input-error for='seller_id' />
                                    </div></div>
                                    <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <x-jet-label value="ISR" />
                                        <input type="number" name="isr" style='width: 60%;'max=1 min=0 step=0.01 value=0> %
                                        <x-jet-input-error for='seller_id' />
                                    </div></div>
                                    <div class="col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <x-jet-label value="Descuento" />
                                        <input type="number" name="descuento" style='width: 60%;'max=1 min=0 step=0.01 value=0> %
                                        <x-jet-input-error for='seller_id' />
                                    </div></div>
                                </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                {{--  <a href="{{ route('internal_orders.index')}}" class="btn btn-black mb-2">
                    <i class="fas fa-times fa-2x"></i>&nbsp;&nbsp; Cancelar
                </a>  --}}
                <button type="submit" class="btn btn-green mb-2">
                    <i class="fas fa-save fa-2x"></i>&nbsp; &nbsp; Siguiente
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