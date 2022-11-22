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
                                <h1 style="font-size : 30px; color: red;">Cancelacion del pago NO. {{$pay->id}}</h1>
                            </td>
                        </tr>
                        <tr>
                            
                        </tr>
</table>

            <div class="col-sm-12 text-center font-bold text-sm">

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
            <div style="color : red">
            Estas a punto de cancelar el pago con id {{$pay->id}} asociado al concepto {{$pay->concept}}
            de la orden {{$order->invoice}} del cliente {{$order->customer}}, es nescesaria una autorizacion.
            <i class="fa-solid fa-exclamation-triangle fa-2xl" ></i>
            </div>
            <br><br><br>
            <div>
            <form action="{{ route('accounting.invalidar') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <x-jet-input type="hidden" name="pay_id" value="{{$pay->id}}"/>
                                    <div class="col">
                                        <span class="text-xs uppercase">Firma: </span><br>
                                    </div>
                                   <br><br>
                                    <div class="row">
                                        <div class="col">
                                            <x-jet-input type="password" name="key" class="w-flex text-xs"/>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-red">Invalidar</button>
                                        </div>
                                    </div>
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

@stop