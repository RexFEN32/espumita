@extends('adminlte::page')

@section('title', 'PEDIDOS INTERNOS')

@section('content_header')
    <h1 class="font-bold"> <i class="fas fa-clipboard-check"></i>&nbsp; PEDIDO INTERNO</h1>
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
                </div>
            </div>
            
            <div class="row p-4">
                <div class="col-sm-9 col-xs-12 font-bold text-sm">
                    <table>
                        <tr>
                            <td>
                                Cliente: {{$Customers->id.' '. $Customers->customer}}<br>
                                Dirección Fiscal: {{$Customers->customer_street.' '.$Customers->customer_outdoor.' '.$Customers->customer_intdoor.' '.$Customers->customer_suburb.' '.$Customers->customer_city.' '.$Customers->customer_state.' '.$Customers->customer_zip_code}}<br>
                                R.F.C: {{$Customers->customer_rfc}} &nbsp; Tel: 01-52 {{$Customers->customer_telephone}} &nbsp; E-mail: {{$Customers->customer_email}} &nbsp; Web: {{$Customers->customer_website}}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-3 col-xs-12 font-bold text-sm">
                    <table>
                        <tr>
                            <td class="card-body bg-white rounded-xl shadow-md text-center text-sm">
                                <span style="color: darkblue">Saldo Deudor:<br><br>
                                {{$saldoDeudor}}</span> 
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row p-4">
                <div class="col-sm-12 font-bold text-sm">
                    <table>
                        <tr>
                            <td>Vendedor: </td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Fecha de Entrega del Equipo: <br>
                            </td>
                            <td>
                                Fecha de Entrega Instalación: <br> 
                            </td>
                            <td>
                                Condiciones de Pago: <br> 
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row p-4">
                <div class="col-sm-12 font-bold text-sm">
                    <table class="table table-striped text-xs font-medium">
                        <thead>
                            <tr class="text-center">
                                <th>Pda</th>
                                <th>Cant</th>
                                <th>Unidad</th>
                                <th>Familia</th>
                                <th>Clave</th>
                                <th>Descripción</th>
                                <th>P. U.</th>
                                <th>Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagos as $row)
                            <tr class="text-center">
                                <td></td>
                                <td>{{ $row->amount }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right">${{number_format($row->amount, 2) }}</td>
                                <td class="text-right">${{number_format($row->amount, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row p-4">
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                        <span class="text-right font-bold text-md">Subtotal: $ </span>
                    </div>
                </div>
                
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">Descuento: $ 0.0</span>  
                    </div>
                </div>
                
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">Desc. Fin: $ 0.0</span>  
                    </div>
                </div>
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">I.E.P.S: $ 0.0</span>  
                    </div>
                </div>
                
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">RET ISR: $ 0.0</span>  
                    </div>
                </div>
                
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">RET IVA: $ 0.0</span>  
                    </div>
                </div>
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">IVA: $ </span>  
                    </div>
                </div>
                
                
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-bold text-xl">Total: $ </span>  
                    </div>
                </div>
            </div>
            <div class="row p-4">
                <div class="col-sm-4 col-xs-12 text-center text-xs font-bold">
                    <table>
                        <tr>
                            <td>
                              
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                <hr><br><br>

                                Elaboró
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-3 col-xs-12 text-center text-xs font-bold">
                    &nbsp;
                </div>
                <div class="col-sm-5 col-xs-12 text-center text-xs font-bold">
                     
                    <br>
                    <hr><br>
                    Autorizaciones
                </div>
            </div>
            <br> <br> 
            
                </div>
                    <input  class="btn btn-green" type="button" name="imprimir" value="Imprimir" id="printPageButton" onclick="window.print();"> 
                    
                                    
                    
  
        </div>
    </div>
    
            
@stop

@section('css')
<style>
@media print {
  #printPageButton {
    display: none;
  }
}
</style>
@stop

@section('js')

@stop