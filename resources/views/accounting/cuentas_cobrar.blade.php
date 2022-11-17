@extends('adminlte::page')

@section('title', 'Cuentas por Cobrar')

@section('content_header')
    <h1 class="font-bold"><i class="fa-solid fa-credit-card"></i>&nbsp; CUENTAS POR COBRAR</h1>
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
  <button type="button" class="btn btn-blue mb-2" onclick="Ordenes()">Ordenes</button>
  <button type="button"class="btn btn-blue mb-2"  onclick="Fechas()">Fecha</button>
</div></div>
<br> <br>
<div id = "ClientView">  
<div class ="col justify-content-start"> </div>
@foreach ($Customers as $row)
<br>
<button class="btn btn-dark" data-toggle="collapse" data-target="#collapseExample{{$row->id}}" aria-expanded="false" aria-controls="collapseExample">
    <i class="fa-solid fa-user fa-2x" ></i>
             &nbsp; &nbsp;
    <p>{{$row->customer}}</p></button></td>
    <div class="collapse" id="collapseExample{{$row->id}}">
    <div class="column">
      <br>
        <table>
        <table class="table tablepayments table-striped text-xs font-medium">
            <thead class="thead">
               <tr>
               <th > Pedido</th>
               <th scope="col">concepto</th>
               <th scope="col">Cantidad</th>
               <th scope="col">Fechade pago</th>
               <th scope="col">Notas</th>
               <th scope="col">Estado</th>
               </tr>
            </thead>

            <tbody>
    @foreach ($accounts as $pago)
        @if($pago->customer_id == $row->id)
                <tr>

                   <td>
                   {{$pago->invoice}}
                    </td>
                    <td>
                   {{$pago->concept}}
                    </td>
                    <td>
                   {{$pago->amount}}
                    </td>
                    <td>
                   {{$pago->date}}
                    </td>
                    <td>
                   {{$pago->nota}}
                    </td>
                    <td>
                      @php {{
                      $fecha = new DateTime($row->date);
                    }}@endphp
                    @if($fecha < now())
                       <a href="{{route('payments.pay_actualize',$pago->id)}}">
                        <button class="button"> <span class="badge badge-danger">Atrasado</span> </button>
                        </a>  
                    @else
                      <a href="{{route('payments.pay_actualize',$pago->id)}}">
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
  <br>
@endforeach
</div>

</div>
<div id = "OrderView">  
@foreach ($Orders as $row)
<br>
<button class="btn btn-dark" data-toggle="collapse" data-target="#collapseExample{{$row->id}}" aria-expanded="false" aria-controls="collapseExample">
    <i class="fa-solid fa-file fa-2x" ></i>
             &nbsp; &nbsp;
    <p>{{$row->invoice}}</p></button></td>
    <div class="collapse" id="collapseExample{{$row->id}}">
    <div class="column">
      <br>
        <table>
        <table class="table tablepayments table-striped text-xs font-medium">
            <thead class="thead">
               <tr>
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
                <tr>

                   <td>
                   {{$row->customer}}
                    </td>
                    <td>
                   {{$pago->concept}}
                    </td>
                    <td>
                   {{$pago->amount}}
                    </td>
                    <td>
                   {{$pago->date}}
                    </td>
                    <td>
                   {{$pago->nota}}
                    </td>
                    <td>
                      @php {{
                      $fecha = new DateTime($row->date);
                    }}@endphp
                    @if($fecha < now())
                       <a href="{{route('payments.pay_actualize',$pago->id)}}">
                        <button class="button"> <span class="badge badge-danger">Atrasado</span> </button>
                        </a>  
                    @else
                      <a href="{{route('payments.pay_actualize',$pago->id)}}">
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
                            <tr class="text-center">
                            @php
{{$order = DB::table('payments')
    ->join('internal_orders', 'payments.order_id', '=', 'internal_orders.id')
    ->where('internal_orders.id', $row->order_id)
    ->first();
    $coin = DB::table('internal_orders')
    ->join('coins', 'coins.id', '=', 'internal_orders.coin_id')
    ->where('internal_orders.id', $row->order_id)
    ->first();
    $fecha = new DateTime($row->date);
    $hoy = new DateTime("2022-11-7");
  }}
@endphp
                                <td> <p>Cliente de prueba 01</p></td>
                                <td> {{ $order->invoice}}</td>
                                <td> {{ $row->concept }}</td>
                                <td> {{ $coin->symbol }}{{ $row->amount }}</td>
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
<script>
  document.getElementById("ClientView").hidden="hidden";
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
@stop