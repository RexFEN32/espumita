@extends('adminlte::page')

@section('title', 'PEDIDO INTERNO')

@section('content_header')
    <h1 class="font-bold"><i class="fa-solid fa-credit-card"></i>&nbsp; CONDICIONES DE PAGO</h1>
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
      <td >2990</td>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Moneda</th>
      <td>MN</td>
      
    </tr>
  </tbody>
</table>
                    <br><br>
                    <table class="table table-striped">
  <thead class="thead">
    <tr>
      <th scope="col">Entregable</th>
      <th scope="col">% negociado</th>
      <th scope="col">Monto sin IVA</th>
      <th scope="col">IVA</th>
      <th scope="col">TOTAL</th>
      <th scope="col">Avances requeridos </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="table-active">Factura y finanzas</td>
      <td >40%</td>
      <td>{{$Subtotal * 0.4 }}</td>
      <td>{{$Subtotal * 0.4 * 0.16 }}</td>
      <td>{{$Subtotal * 0.4 * 1.16 }}</td>
      <td>0.0%</td>
    </tr>
    <tr>
      <td >Planos de Ingeniería</td>
      <td >20%</td>
      <td>{{$Subtotal * 0.2 }}</td>
      <td>{{$Subtotal * 0.2 * 0.16 }}</td>
      <td>{{$Subtotal * 0.2 * 1.16 }}</td>
      <td>60.0%</td>
    </tr>
    <tr>
    <td scope="row">Compra total de materiales</td>
      <td >20%</td>
      <td>{{$Subtotal * 0.2 }}</td>
      <td>{{$Subtotal * 0.2 * 0.16 }}</td>
      <td>{{$Subtotal * 0.2 * 1.16 }}</td>
      <td>80.0%</td>
    </tr>
    <tr>
    <td scope="row">Equipos listos para Embarque</td>
      <td >10%</td>
      <td>{{$Subtotal * 0.1 }}</td>
      <td>{{$Subtotal * 0.1 * 0.16 }}</td>
      <td>{{$Subtotal * 0.1 * 1.16 }}</td>
      <td>90.0%</td>
    </tr>
    <tr>
    <td scope="row">Entrega Final a Satisfaccion</td>
      <td >10%</td>
      <td>{{$Subtotal * 0.1 }}</td>
      <td>{{$Subtotal * 0.1 * 0.16 }}</td>
      <td>{{$Subtotal * 0.1 * 1.16 }}</td>
      <td>100.0%</td>
    </tr>
    <tr>
    <td ></td>
    <th scope="row">TOTAL </th>
      
      <td>{{ $Subtotal}}</td>
      <td>{{ $Subtotal*0.16}}</td>
      <td>{{ $Subtotal*1.16}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
    <td ></td>
    <th scope="row">Validacion </th>
      
      <td>$0.00</td>
      <td>$0.00</td>
      <td>$0.00</td>
      <td></td>
    </tr>
    <tr>
    <td> </td>
      <td > <button class="btn btn-dark"> <p>Editar porcentaje</p></button></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
                </div>
                <button class="btn btn-dark">
                <i class="fa-solid fa-calendar fa-2x" ></i>
                         &nbsp; &nbsp;
                <p>Calendarizar Pagos</p></button></td>
             </div>
        </div>
</div>

@stop

@section('css')
    
@stop

@section('js')

@stop