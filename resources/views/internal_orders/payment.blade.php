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
      <td ><input type="text" value="{{$percentage->factures }}" style="width: 20%;" > %</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->factures}}</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->factures* 0.16 }}</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->factures* 1.16 }}</td>
      <td>0.0%</td>
    </tr>
    <tr>
      <td >Planos de Ingeniería</td>
      <td ><input type="text" value="{{$percentage->bluprints }}" style="width: 20%;" > %</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->bluprints }}</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->bluprints * 0.16 }}</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->bluprints * 1.16 }}</td>
      <td>60.0%</td>
    </tr>
    <tr>
    <td scope="row">Compra total de materiales</td>
      <td ><input type="text" value="{{$percentage->finances }}" style="width: 20%;" > %</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->finances}}</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->finances * 0.16 }}</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->finances * 1.16 }}</td>
      <td>80.0%</td>
    </tr>
    <tr>
    <td scope="row">Equipos listos para Embarque</td>
      <td ><input type="text" value="{{$percentage->shipment }}" style="width: 20%;" > %</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->shipment }}</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->shipment * 0.16 }}</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->shipment * 1.16 }}</td>
      <td>90.0%</td>
    </tr>
    <tr>
    <td scope="row">Entrega Final a Satisfaccion</td>
      <td ><input type="text" value="{{$percentage->final }}" style="width: 20%;" > %</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->final }}</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->final * 0.16 }}</td>
      <td> {{$Coins -> symbol}} {{$Subtotal * $percentage->final * 1.16 }}</td>
      <td>100.0%</td>
    </tr>
    <tr>
    <td ></td>
    <th scope="row">TOTAL: </th>
      
      <td>{{$Coins -> symbol}} {{ $Subtotal}}</td>
      <td> {{$Coins -> symbol}} {{ $Subtotal*0.16}}</td>
      <td> {{$Coins -> symbol}} {{ $Subtotal*1.16}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
    <td ></td>
    <th scope="row">Validacion: </th>
      
      <td>$0.00</td>
      <td>$0.00</td>
      <td>$0.00</td>
      <td></td>
    </tr>
    <td > </td>
      
      <td><button class="btn btn-dark">
                <i class="fa-solid fa-repeat fa-2x" ></i>
                         &nbsp; &nbsp;
                <p>Actualizar Porcentajes</p></button></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    
   
  </tbody>
</table>
                </div>
                <button class="btn btn-dark" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa-solid fa-calendar fa-2x" ></i>
                         &nbsp; &nbsp;
                <p>Calendarizar Pagos</p></button></td>
                <div class="collapse" id="collapseExample">
                <div class="column">
                  <br><br><br>
  <div class="row">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Primer Pago</h5>
        <br>
        <input type="date" id="birthday" name="birthday">
        &nbsp; &nbsp; {{$Coins -> symbol}} <input type="number" min="1" step="100"  style="width: 20%;">
        <br>
        <div style="padding: 8px;"><h1>Status: <span class="badge badge-info">Por Cobrar</span></h1></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Segundo Pago</h5>
        <br>
        <input type="date" id="birthday" name="birthday">
        &nbsp; &nbsp; {{$Coins -> symbol}} <input type="number" min="1" step="100"  style="width: 20%;">
        <br>
        <div style="padding: 8px;"><h1>Status: <span class="badge badge-info">Por Cobrar</span></h1></div>
      </div>
    </div>
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

@stop