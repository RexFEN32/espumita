@extends('adminlte::page')

@section('title', 'Cuentas por Cobrar')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-credit-card"></i>&nbsp; CUENTAS POR COBRAR</h1>
@stop

@section('content')
<div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="row p-4">
              
                <div class="col-sm-12 text-center font-bold text-sm">
                
  
                <div class="float-left"><h1><span class="badge badge-danger"> $ {{$total}} <br> por cobrar <br> </span></h1></div>
                <br><br>
                <div class="container" style ="padding: 15px">
                <div class="btn-group" role="group"  aria-label="Basic example">
  <button type="button" class="btn btn-blue mb-2" onclick="Clientes()">Clientes</button>
  <button type="button" class="btn btn-blue mb-2" onclick="Ordenes()">Pedido</button>
  <button type="button"class="btn btn-blue mb-2"  onclick="Fechas()">Fecha</button>
</div></div>
<br> <br>
<div id = "ClientView">  
<div class ="justify-content-rigth"> </div>



<div class="col-sm-12 table-responsive">
            
<table id="example" class=" table-striped text-xs font-small" >
                  <thead>
                            <tr>
                                
                                <th>Clave</th>
                                <th>Razón Social</th>
                                <th>RFC</th>
                                
                                <th>Municipio</th>
                                
                                
                                <th style="width:13%"> Ver cuentas por Cobrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Customers as $row)
                             @if($clientes->contains('id',$row->id))
                            <tr>
                                <td>{{$row->clave}}</td>
                                <td>{{$row->customer}}</td>
                                <td>{{$row->customer_rfc}}</td>
                                
                                <td>{{$row->customer_city}}</td>
                                
                                <td class="w-5">
                                    <div class="row">
                                    <div class="col"></div>
                                        <div class="col-6 text-center w-10" >
                                        
                                            <a href="{{ route('accounting.cuentas_customer', $row->id)}}">
                                                <i class="fas fa-usd btn btn-blue w-3 h-3"></i>
                                            </a>
                                            
                                        </div>
                                        <div class="col"></div> 
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>


</div>

</div>
<div id = "OrderView">  
@foreach ($Orders as $row)
<br>
<button class="btn btn-blue" data-toggle="collapse" data-target="#collapseExample{{$row->id}}" aria-expanded="false" aria-controls="collapseExample">
    <i class="fas fa-file fa-2x" ></i>
             &nbsp; &nbsp;
    <p>{{$row->invoice}}</p></button></td>
    <div class="collapse" id="collapseExample{{$row->id}}">

@php
{{
  $pagos = $accounts->where('order_id',$row->id);
  $pendientes = $pagos->where('status','por cobrar');
  $pagados = $pagos ->where('status','pagado');
}}
@endphp

    <table>
        <tbody>
          <tr>
            <td>
              Monto total del pedido
            </td>
            <td>
              Abonos pagados
            </td>
            <td>
              Porcentaje completado
            </td>
            <td>
              Saldo deudor
            </td>
          </tr>
          <tr>
            <td>
             {{$row->symbol}} {{number_format($row->subtotal*1.16)}}
            </td>
            <td>
            {{$pagados->count() }} / {{ $pagos->count()}}
            </td>
            <td>
              {{$pagados->sum('percentage')}} %
            </td>
            <td style="color : red ">
            {{$row->symbol}} {{number_format($pendientes ->sum('amount'))}}
            </td>
          </tr>
        </tbody>
      </table>
    <div class="column">
      <br>
        <table>
        <table class="table-striped text-xs font-medium">
            <thead class="thead">
               <tr style = "font-size : 14px; margin : 15px">
               <th > Cliente</th>
               <th scope="col">concepto</th>
               <th scope="col">Cantidad</th>
               <th scope="col">Fechade pago</th>
               <th scope="col">Notas</th>
               <th scope="col">Estado</th>
               </tr>
            </thead>

            <tbody>
    @foreach ($accounts as $pago)
        @if($pago->order_id == $row->id)
                <tr  style = "font-size : 14px; margin : 15px">

                   <td>
                   {{$row->customer}}
                    </td>
                    <td>
                   {{$pago->concept}}
                    </td>
                    <td>
                   {{$row->symbol}}{{number_format($pago->amount)}}
                    </td>
                    <td>
                   {{$pago->date}}
                    </td>
                    <td>
                   {{$pago->nota}}
                    </td>
                    <td>
                    @php {{
                      $fecha = new DateTime($pago->date);
                    }}@endphp

                    @if($pago->status == 'pagado')
                    <a href="{{route('payments.pay_actualize',$pago->id)}}">
                        <button class="button"> <span class="badge badge-success">Pagado</span> </button>
                        </a> 
                      
                      @else
                      @if( now() > $fecha)
                      <a href="{{route('payments.pay_actualize',$pago->id)}}">
                      <button class="button"> <span class="badge badge-danger">atrasado</span> </button>
                      </a>  
                    @else
                      <a href="{{route('payments.pay_actualize',$pago->id)}}">
                      <button class="button"> <span class="badge badge-info">por cobrar</span> </button>
                      </a>
                      @endif     
                    @endif          
                                
                    </td>
                </tr>

                @endif
      @endforeach
            </tbody>
        </table>
        
    </div>
  </div>
  <br>
@endforeach

</div>

<br><br><br><br>
<div id = "DateView">  
  <div style ="flex-direction: row">  
    <p>Fehca Inicial</p>  <input type="date" style="width : 20%">&nbsp;&nbsp;&nbsp;
    <h1>Fehca Final</h1>  <input type="date" style="width : 20%">&nbsp;&nbsp;&nbsp;
  </div>
  <br>
        <div class="col-sm-12 table-responsive">
                  
<table class="table tablepayments table-striped text-xs font-medium">
  <thead class="thead">
    <tr>
      <th scope="col">Cliente</th>
      <th > Pedido</th>
      <th scope="col">concepto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Fechade pago</th>
      <th scope="col">Notas</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($accounts as $row)
  
@if($row->status=="por cobrar")
                            <tr class="text-center">
                            @php
{{$order = DB::table('payments')
    ->join('internal_orders', 'payments.order_id', '=', 'internal_orders.id')
    ->join('customers','customers.id','=','internal_orders.customer_id')
    ->select('payments.*','customers.customer','internal_orders.invoice')
    ->where('payments.order_id', $row->order_id)
    ->first();
    $coin = DB::table('internal_orders')
    ->join('coins', 'coins.id', '=', 'internal_orders.coin_id')
    ->where('internal_orders.id', $row->order_id)
    ->first();
    $fecha = new DateTime($row->date);
    $hoy = new DateTime("2022-11-7");
  }}
@endphp
                                <td> <p>{{$order->customer}}</p></td>
                                <td> {{ $order->invoice}}</td>
                                <td> {{ $row->concept }}</td>
                                <td> {{ $coin->symbol }}{{ number_format($row->amount) }}</td>
                                <td>{{ $row->date}} </td>
                               
                                <td>{{ $row->nota }}</td>
                                <td>

                                @if($fecha < now())
                                <a href="{{route('payments.pay_actualize',$row->id)}}">
                                  <button class="button"> <span class="badge badge-danger">Atrasado</span> </button>
                                  </a>  
                                  @else
                                  <a href="{{route('payments.pay_actualize',$row->id)}}">
                                    <button class="button"> <span class="badge badge-info">por cobrar</span> </button>
                                     </a>     
                                  @endif
                                 
                               </td>
                                
                            </tr>
@endif
                            @endforeach
  
  </tbody>
</table>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    
@stop

@section('js')

<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tablecatalogopayments.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tablecatalogocustomers.js') }}"></script>

<script>
  document.getElementById("DateView").hidden="hidden";
  document.getElementById("OrderView").hidden="hidden";

  function Clientes(){
    document.getElementById("ClientView").hidden="";
    document.getElementById("OrderView").hidden="hidden";
    document.getElementById("DateView").hidden="hidden";
  }
  
  function Ordenes(){
    document.getElementById("ClientView").hidden="hidden";
    document.getElementById("DateView").hidden="hidden";
    document.getElementById("OrderView").hidden="";
  }

  function Fechas(){
    document.getElementById("ClientView").hidden="hidden";
    document.getElementById("DateView").hidden="";
    document.getElementById("OrderView").hidden="hidden";
  }
</script>
<script>

$(document).ready(function () {
    $('#example').DataTable();
});
</script>

@stop