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
                        <td style="background-color:#A6ADBC"> Cantidad del pago</td>
                        <td> $ {{number_format($pay -> amount)}}</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div>
                El cliente ya realizó el pago?
                <br>
                Ingresa su comprobante
                <br>
                <br>
                <br>
                <input type="file">
            </div>
         <br><br>
            <button   type="button" class="btn btn-green mb-2"  onclick="guardar()">
                <i class="fa-solid fa-usd fa-2x" ></i>
                         &nbsp; &nbsp;
                <p>Marcar como Pagado</p></button>

            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    
@stop

@section('js')



@stop