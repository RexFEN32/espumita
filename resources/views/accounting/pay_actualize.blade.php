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
                <table>
                        <tr>
                            <td rowspan="4">
                               <img src="{{asset('img/logo/logo.svg')}}" alt="TYRSA">
                            </td>
                            <td>
                                <h1 style="font-size : 30px;">Aplicacion del pago NO. {{$pay->id}}</h1>
                            </td>
                        </tr>
                        <tr>
                            
                        </tr>
</table>

            <div class="col-sm-12 text-center font-bold text-sm">Actualizar  el pago

            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td style="background-color:#A6ADBC"> Cliente</td>
                        <td>Cliente de Prueba 01</td>
                    </tr>
                    <tr>
                        <td style="background-color:#A6ADBC"> Pedido </td>
                        <td>{{$order->invoice}}</td>
                    </tr>
                    <tr>
                        <td style="background-color:#A6ADBC"> Cantidad del pago</td>
                        <td> $ {{number_format($pay -> amount)}}</td>
                    </tr>
                    <tr>
                        <td>Concepto</td>
                        <td>{{ $pay ->concept }}</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div>
            <form action="{{ route('accounting.pay_apply')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-jet-input type="hidden" name="pay_id" value="{{$pay->id}}"/>
                
                @if($pay -> status == 'por cobrar')
                 
                 <h1>Pago pendiente</h1>
                 El cliente ya realizó el pago?
                <br>
                Ingresa su comprobante
                <br>
                <br>
                <br>
                <input type="file" name="comprobante" id="comp" onchange="mostrar()">
                <button   type="submit" class="btn btn-green mb-2" id="btn"  onclick="guardar()" style="display: none">
                <i class="fa-solid fa-usd fa-2x" ></i>
                         &nbsp; &nbsp;
                <p>Marcar como Pagado</p></button>
                @else

                <h1>Pago completado</h1>

              <br>
              {{$url}}
             <a href="{{ $url}}">
             <button type="button" class="btn btn-blue">
              <i class="fa-solid fa-eye fa-2x"></i> &nbsp; Ver comprobante 
             </button></a>
             
             <br><br><br>

             <p>Hubó algun problema con la validación del pago o fue revocadó?</p>
             <a href="{{route('pay_cancel',$pay->id)}}">
             <button type="button" ><span class="badge badge-pill badge-danger" style="font-size : 20px"> Invalidar pago</span></button>
              </a>
                @endif
                                
                </form>
                
            </div>
         <br><br>
         
            </div>
        </div>
    </div>
</div>

@stop

@section('css')

    
@stop


@section('js')
<script>
const inFile = document.getElementById("comp");

inFile.addEventListener("change", mostrar);

function mostrar(){
    document.getElementById("btn").style.display="flex";
}

   
</script>
@stop