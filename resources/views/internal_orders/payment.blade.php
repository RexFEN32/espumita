@extends('adminlte::page')

@section('title', 'PEDIDO INTERNO')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-credit-card"></i>&nbsp; CONDICIONES DE PAGO</h1>
    
@stop

@section('content')
<div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">

        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="row p-4">
                <div class="col-sm-12 text-center font-bold text-sm">
                <table>
                        <tr>
                            <td rowspan="4">
                               <img src="{{asset('img/logo/logo.svg')}}" alt="TYRSA">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-lg" style="color: red">{{ $CompanyProfiles->company}}</td>
                        </tr>
                        <tr>
                            <td>{{ $CompanyProfiles->motto}}</td>
                        </tr>
                        <tr class="text-xs">
                            <td>
                                <br>
                                Domicilio Fiscal:<br>
                                {{$CompanyProfiles->street.' '.$CompanyProfiles->outdoor.' '.$CompanyProfiles->intdoor.' '.$CompanyProfiles->suburb.' '.$CompanyProfiles->city.' '.$CompanyProfiles->state.' '.$CompanyProfiles->zip_code}}<br>
                                R.F.C: {{$CompanyProfiles->rfc}} &nbsp; Tels: 01-52 {{$CompanyProfiles->telephone.', '.$CompanyProfiles->telephone2}} &nbsp; E-mail: {{$CompanyProfiles->email}} &nbsp; Web: {{$CompanyProfiles->website}}
                            </td>
                        </tr>
                    </table>
                    <br><br>
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">RESUMEN DEL PEDIDO INTERNO (P.I.) NUMERO</th>
      <td >{{$InternalOrders->invoice}}</td>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Moneda</th>
      <td>{{$Coins->code}}</td>
      
    </tr>
  </tbody>
  
</table>
                    <br><br>
<p style ="font-size:250%;">Ingrese los porcentajes de avance</p>
<br><br>
<form action="{{ route('internal_orders.pay_conditions')}}" method="POST" enctype="multipart/form-data" id="form1">
@csrf
<x-jet-input type="hidden" name="rowcount"  id="rowcount" value={{$npagos}}/>
<x-jet-input type="hidden" name="customerID"   value="{{$InternalOrders->customer_id}}" />
<x-jet-input type="hidden" name="sellerID" value="{{$InternalOrders->seller_id}}"/>
<x-jet-input type="hidden" name="sellerID" value="{{$InternalOrders->customer_shipping_address_id}}"/>
<x-jet-input type="hidden" name="coinID" value="{{$InternalOrders->coin_id}}"/>
<x-jet-input type="hidden" name="subtotal" id="subtotal" value="{{$InternalOrders->subtotal}}"/>
<x-jet-input type="hidden" name="order_id" value="{{$InternalOrders->id}}"/>
<x-jet-input type="hidden" name="" value=0/>
<table class="table table-striped" name="tabla1" id="tabla1">
  <thead class="thead">
    <tr>
      <th scope="col">Entregable</th>
      <th scope="col">% negociado</th>
      <th scope="col">cantidad</th>
      <th scope="col">Fecha</th>
      <th scope="col">Concepto</th>
    </tr>
  </thead>
  <tbody>
  @php
    $emision = new DateTime($InternalOrders->reg_date);
    $entrega = new DateTime($InternalOrders->date_delivery);
    @endphp
    
   
   @for ($i = 1; $i <= $npagos; $i++)
    
   @php
      $aux_count=$aux_count+1;
      @endphp
    
    <tr>
        <td>{{'PAGO '.$aux_count}}</td>
        <td> <input type='number' min='0' max='100' step='5'  style='width: 70%;' name="{{'porcentaje['.$aux_count.']'}}"  id="{{'P'.$aux_count}}">%</td>
        <td> {{$Coins -> symbol}}<span id="{{'R'.$aux_count}}" ></span> </td>
        @if($i==1)
        
    <td> <input type='date'  required class='w-full text-xs' name="{{'date['.$aux_count.']'}}"  id="{{'D'.$aux_count}}" value="{{$emision->format('Y-m-d');}}"></td>
        
    @else
    <td> <input type='date'  required class='w-full text-xs' name="{{'date['.$aux_count.']'}}"  id="{{'D'.$aux_count}}"  value="{{$entrega->format('Y-m-d');}}"></td>
         @endif
        <td> <input type='text' style='width: 50%;'  name="{{'concepto['.$aux_count.']'}}" id="{{'C'.$aux_count}}"onkeyup="javascript:this.value=this.value.toUpperCase();"></td>
        
     </tr>
      

      @endfor
    <tr >
    <th scope="row">TOTAL: </th>
      
      <td>{{$Coins -> symbol}} {{ number_format($Subtotal,2)}}</td>
      <td> {{$Coins -> symbol}} {{number_format( $Subtotal*0.16,2)}}</td>
      <td> {{$Coins -> symbol}} {{number_format( $Subtotal*1.16,2)}}</td>
    </tr>
    
    </tbody>
</table>

<!--
      <td> <span><button type="button" onclick="myFunction()"  class="btn btn-blue mb-2"> </span>
      <i class="fa fa-plus" ></i>
      &nbsp; &nbsp;
      <p>Agregar Concepto</p></button></td>-->
      
  
    <br>
    <br><br>

    <button   type="button" class="btn btn-green mb-2"  onclick="guardar()">
                <i class="fas fa-save fa-2x" ></i>
                         &nbsp; &nbsp;
                <p>Guardar Porcentaje de Avance</p></button>
 

                </div>
                </form>
                
                
</div>

@stop

@section('css')
    
@stop

@section('js')

@if ($actualized == 'SI')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/percentage_actualized.js') }}"></script>
@endif

@if ($actualized == 'NO')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/percentage_incorrect.js') }}"></script>
@endif

<script>
  P5.oninput = function() {
    total = parseInt(document.getElementById('subtotal').value)*1.16;
    console.log(total)
    R5.innerHTML =parseInt( parseInt(P5.value)*total*0.01+1).toLocaleString('en-US');
  };
</script>

<script>
  P1.oninput = function() {
    total = parseInt(document.getElementById('subtotal').value)*1.16;
    console.log(total)
    R1.innerHTML =parseInt( parseInt(P1.value)*total*0.01).toLocaleString('en-US');
  };
</script>

<script>
  P3.oninput = function() {
    total = parseInt(document.getElementById('subtotal').value)*1.16;
    console.log(total)
    R3.innerHTML =parseInt( parseInt(P3.value)*total*0.01+1).toLocaleString('en-US');
  };
</script>
<script>
  P4.oninput = function() {
    total = parseInt(document.getElementById('subtotal').value)*1.16;
    console.log(total)
    R4.innerHTML =parseInt( parseInt(P4.value)*total*0.01+1).toLocaleString('en-US');
  };
</script>
<script>
  P2.oninput = function() {
    total = parseInt(document.getElementById('subtotal').value)*1.16;
    console.log(total)
    R2.innerHTML =parseInt( parseInt(P2.value)*total*0.01+1).toLocaleString('en-US');
  };
</script>

<script>
    function guardar() {
      var total=parseInt(0);
      console.log("todo bien");
      var count= parseInt("{{$npagos}}")
      var myForm = document.forms.form1;
      var myControls = myForm.elements['porcentaje'];
      
      for (var i = 1; i <= count; i++) {
      console.log(i);
      var p=document.getElementById("P"+i).value;
      console.log("todo bien");
      var c=document.getElementById("C"+i).value;
      var d=document.getElementById("D"+i);
      console.log(c)
      //var campo = $('#id_del_input').val();
      total=total+parseInt(p);
      if (c=="") {
        console.log("concepto vacio")
        alert("Concepto sin nombre");
        console.log("concepto vacio")
      }
      console.log(d)
      if (!d.value) {
        console.log("Fecha vacia");
        alert("Fecha Vacía");
      }
      }
      console.log(total);
      if (total != 100) {
      alert("Los porcentajes no suman 100%");
      
         }else
      document.getElementById("form1").submit();


    }
</script>
@stop