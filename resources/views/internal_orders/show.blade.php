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
                            
                        <td class="text-lg" style="color: red">{{ $CompanyProfiles->company}}
                        <img src="{{asset('img/logo/logo.svg')}}" alt="TYRSA"></td>
                        <td>
                        <br>
                                Domicilio Fiscal:<br>
                                {{$CompanyProfiles->street.' '.$CompanyProfiles->outdoor.' '}}
                                {{$CompanyProfiles->intdoor.' '.$CompanyProfiles->suburb}}
                                <br>{{$CompanyProfiles->city.' '.$CompanyProfiles->state.' '.$CompanyProfiles->zip_code}}<br>
                                R.F.C: {{$CompanyProfiles->rfc}} &nbsp; Tels: 01-52 {{$CompanyProfiles->telephone.', '.$CompanyProfiles->telephone2}} <br> E-mail: {{$CompanyProfiles->email}} &nbsp; Web: {{$CompanyProfiles->website}}
                            
                        </td>
                        <td class="card-body bg-white rounded-xl shadow-md text-center text-sm">
                                <span style="color: darkblue">Numero PI:<br>
                                {{$InternalOrders->invoice}}</span>
                                <br> <br>
                                NOHA: {{$InternalOrders->noha}} 
                            </td>
                        </tr>

                    </table>


                </div>
            </div>
            <table>
                        <th>Datos del Cliente</th>
                    </table>
            <div class="row p-4">
                <div class="col-sm-9 col-xs-12 font-bold text-sm">
                  <table class="table table-striped text-xs font-medium"> 
                    <tr class="text-center">
                        <td>Numero de cliente:</td>
                        <td style="LINE-HEIGHT:50px" class="card-body bg-white rounded-xl shadow-md text-center text-sm">{{$Customers->clave}}</td>
                        
                        <td>Nombre corto:</td>
                        <td class="card-body bg-white rounded-xl shadow-md text-center text-sm">{{$Customers->alias}}</td>
                        
                        <td>CP:</td>
                        <td class="card-body bg-white rounded-xl shadow-md text-center text-sm">{{$Customers->customer_zip_code}}</td>
                    
                    </tr>
                    <tr class="text-center">
                        <td>Razon Social:</td>
                        <td colspan="5" >{{$Customers->legal_name}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="text-center">
                  <td>RFC:</td>
                        <td>{{$Customers->customer_rfc}}</td>
                        
                        <td>OC:</td>
                        <td>{{$InternalOrders->oc}}</td>
                        <td>Contrato No.:</td>
                        <td>{{$InternalOrders->ncontrato}}</td>
                        <td></td>
                        <td></td>
                         </tr>
                    <tr class="text-center">
                    <td rowspan="3">Domicilio Fiscal: </td>
                    <td colspan="6">{{$Customers->customer_street.' '.$Customers->customer_outdoor.' '.$Customers->customer_intdoor.' '.$Customers->customer_suburb.' '.$Customers->customer_city.' '.$Customers->customer_state.' '.$Customers->customer_zip_code}}<br>
                                 &nbsp; E-mail: {{$Customers->customer_email}} &nbsp; Web: {{$Customers->customer_website}}
                            </td>
                    </tr>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan = "3">Fechas</td>
                    </tr>
                    <tr class="text-center">
                        <td></td>
                        <td>Tel:</td>
                        <td> {{$Customers->customer_telephone}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Semanas</td>
                        <td>Evento</td>
                        <td>DD-MM-AA</td>
                    </tr >
                    <tr class="text-center">
                        <td rowspan="3">Embarque:</td>
                        <td rowspan="3">Si</td>
                        <td>Domicilio Embarque:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Emision PI</td>
                        <td>{{$InternalOrders->reg_date}}</td>
                    </tr>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td>{{$CustomerShippingAddresses->customer_shipping_city.' '.$CustomerShippingAddresses->customer_shipping_city.' '.$CustomerShippingAddresses->customer_shipping_suburb.' '.$CustomerShippingAddresses->customer_shipping_street.' '.$CustomerShippingAddresses->customer_shipping_indoor}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Entrega Equipo</td>
                        <td>{{$InternalOrders->date_delivery}}</td>
                    </tr>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td>CP:</td>
                        <td>{{$CustomerShippingAddresses->customer_shipping_zip_code}}</td>
                        <td></td>
                        <td></td>
                        <td>Instalacion</td>
                        <td>{{$InternalOrders->instalation_date}}</td>
                    </tr>
                  </table>


                  
               
                
                <br> &nbsp;  
                <table>
                    <tr>
                        <th> Contacto</th>
                        <th> Nombre</th>
                        <th> Tel fijo</th>
                        <th> Tel movil</th>
                        <th> Email</th>
                    </tr>
                    
                    <tbody>
                    @foreach($Contacts as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->customer_contact_name}}</td>
                        <td>{{$row->customer_contact_office_phone}}</td>
                        <td>{{$row->customer_contact_mobile}}</td>
                        <td>{{$row->customer_contact_email}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            <br> &nbsp;
            <table>
                <tr>
                    <th>Vendedor</th>
                    <th>Comisión</th>
                    <th>Cotización Numero</th>
                    <th>Moneda</th>
                    <th>Cat Equipo</th>
                    <th>Descripcion Global <br>Proyecto</th>
                    <th>Ubicación <br> Sucursal <br> Tienda</th>
                </tr>
                <tbody>
                    <tr>
                        <td> {{$Sellers->seller_name}}</td>
                        <td>{{$InternalOrders->comision * 100}} %</td>
                        <td>{{$InternalOrders->ncotizacion}}</td>
                        <td> {{$Coins->coin}}</td>
                        <td> </td>
                        <td> </td>
                        <td>{{$Customers->customer_city.' '.$Customers->customer_suburb.' '.$Customers->customer_street.' '.$Customers->customer_outdoor.' '  }} </td>

                    </tr>
                </tbody>
            </table>
            <div class="row p-4">
                <div class="col-sm-12 font-bold text-sm">
                    <table>
                        <tr>
                            <td>Vendedor: {{$Sellers->id}}</td>
                        </tr>
                        <tr>
                            <td>
                                @if ($InternalOrders->shipment == 'Sí')
                                    Dirección Embarque: {{$CustomerShippingAddresses->customer_shipping_street.' '.$CustomerShippingAddresses->customer_shipping_outdoor.' '.$CustomerShippingAddresses->customer_shipping_intdoor.' '.$CustomerShippingAddresses->customer_shipping_suburb.' '.$CustomerShippingAddresses->customer_shipping_city.' '.$CustomerShippingAddresses->customer_shipping_state.' '.$CustomerShippingAddresses->customer_shipping_zip_code}}<br>
                                @else
                                    Dirección Embarque:
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Fecha de Emision <br> del Pedido: <br>{{ date('d-m-Y', strtotime($InternalOrders->reg_date))}}
                            </td>
                            <td>
                                Fecha de Entrega del Equipo: <br>{{ date('d-m-Y', strtotime($InternalOrders->date_delivery))}}
                            </td>
                            <td>
                                Fecha de Entrega Instalación: <br> {{ date('d-m-Y', strtotime($InternalOrders->instalation_date))}}
                            </td>
                            <td>
                                Condiciones de Pago: <br> {{ $InternalOrders->payment_conditions}}
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
                            @foreach ($Items as $row)
                            <tr class="text-center">
                                <td>{{ $row->item }}</td>
                                <td>{{ $row->amount }}</td>
                                <td>{{ $row->unit }}</td>
                                <td>{{ $row->family }}</td>
                                <td>{{ $row->code }}</td>
                                <td>{{ $row->description }}</td>
                                <td class="text-right">${{number_format($row->unit_price, 2) }}</td>
                                <td class="text-right">${{number_format($row->import, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="row p-4">
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                        <span class="text-right font-bold text-md">Subtotal: $ {{number_format($InternalOrders->subtotal,2)}}</span>
                    </div>
                </div>
                
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">Descuento:  {{$InternalOrders->descuento}} %</span>  
                    </div>
                </div>
                
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">Desc. Fin: $ {{number_format($InternalOrders->descuento * $InternalOrders->subtotal)}}</span>  
                    </div>
                </div>
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">I.E.P.S: $ {{number_format($InternalOrders->ieps * $InternalOrders->subtotal)}}</span>  
                    </div>
                </div>
                
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">RET ISR: $ {{number_format($InternalOrders->isr * $InternalOrders->subtotal)}}</span>  
                    </div>
                </div>
                
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">RET IVA: $ 0.0</span>  
                    </div>
                </div>
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-semibold text-sm">IVA: $ {{number_format($InternalOrders->iva,2)}}</span>  
                    </div>
                </div>
                
                
                <div class="col-sm-12 text-right">
                    <div class="form-group">
                      <span class="text-right font-bold text-xl">Total: $ {{number_format($InternalOrders->total,2)}}</span>  
                    </div>
                </div>

                <br>&nbsp;
                <div class="col-sm-3 font-bold text-sm">
                <table class="table table-striped text-xs font-medium" >
                   <tr>
                    <td>Numero de Pagos:</td>
                    <td>{{$payments->count()}}</td>
                   </tr>
                   <tr> 
                    <td>Condiciones de Pago:</td>
                    <td> @foreach($payments as $pay)
                        {{$pay->percentage}}% &nbsp; {{$pay->concept}},<br>
                        @endforeach
                    </td>
                   </tr>
                   <tr>
                    <td>Promesas de Pago:</td>
                    <td></td>
                   </tr>
                </table>
                </div>
                
               <br><br>
               <table class="table table-striped text-xs font-medium">
               <tr> <th colspan="8" style="text-align: center;">Tabla de Promesas de Pago</th></tr>
               
                <tr>
                    <th rowspan="2"> Pago No.</th>
                    <th rowspan="2">Fecha <br> Promesa </th>
                    <th rowspan="2"> Dia </th>
                    <th rowspan="2">Semana </th>
                    <th colspan="3">Importe por cobrar</th>
                    <th rowspan="2">% del Total</th>
                </tr>
                <tr>
                    <th>Subtotal</th>
                    <th>Iva</th>
                    <th>Total con Iva</th>
                </tr>
                <tbody>
                    @php
                    $p=0;
                    @endphp
                    @foreach($payments as $pay)
                    @php
                    {{$datetime1 = new DateTime($row->date);
                    $datetime2 = new DateTime("2023-1-1");
                    $dias = $datetime1->diff($datetime2)->format('%a');
                    $p=$p+1;}}
                    @endphp
                    <tr>
                        <td>{{$p}}</td>
                        <td>{{$pay->date}}</td>
                        <td>{{$dias}}</td>
                        <td>{{(int)($dias / 7)}}</td>
                        <td>{{$pay->amount-$pay->amount*0.16}}</td>
                        <td>{{$pay->amount*0.16}}</td>
                        <td>{{$pay->amount}}</td>
                        <td>{{$pay->percentage}} %</td>
                        
                    </tr>
                    
                    @endforeach
                </tbody>
               </table>
                
               <br>&nbsp;
               <table class="table table-striped text-xs font-medium" style="text-align: center;">
                <tr>
                    <th>Observaciones</th>
                </tr>
                <tbody>
                    <tr>
                        <td>{{$InternalOrders->observations}}</td>
                    </tr>
                </tbody>
               </table>
               <div class="col-sm-9 font-bold text-sm">
               <table>
                <tr class="text-center"><th colspan="2">Correos Personales</th></tr>
                <tr class="text-center">
                    <th>Contacto</th>
                    <th>Email Personal</th>
                 </tr>
                 <tbody>
                 @foreach($Contacts as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->customer_contact_email}}</td>
                    </tr>
                    @endforeach
                 </tbody>

               </table>
               </div>
<br>&nbsp;
               <div class="col-sm-9 font-bold text-sm">
               <table>
                <tr class="text-center"><th colspan="4">Otras Comisiones</th></tr>
                <tr class="text-center">
                    <th>Vendedor</th>
                    <th>Inicia</th>
                    <th>Descripcion</th>
                    <th>%</th>
                 </tr>
                 <tbody>
                 
                    <tr>
                        <td>{{$Sellers->seller_name}}</td>
                        <td>Comision</td>
                        <td> -</td>
                        <td> {{$InternalOrders->comision *100}} %</td>
                    </tr>
                    <tr>
                        <td>{{$Sellers->seller_name}}</td>
                        <td>dgi</td>
                        <td> -</td>
                        <td> {{$InternalOrders->dgi *100}} %</td>
                    </tr>
                    <tr>
                        <td>{{$Sellers->seller_name}}</td>
                        <td>otra</td>
                        <td> -</td>
                        <td> {{$InternalOrders->otra *100}} %</td>
                    </tr>
                   
                 </tbody>

               </table>
               </div>


            </div>
            <div class="row p-4">
                <div class="col-sm-4 col-xs-12 text-center text-xs font-bold">
                    <table>
                        <tr>
                            <td>
                                {{$Sellers->seller_name}}<br>
                              <!--  {{$Sellers->seller_email.' '.$Sellers->seller_mobile}}-->
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
                     @foreach ($requiredSignatures as $firma)
       

                        <ul>
                            <li>
                                <div class="row">


                                    @if($firma->status == 0)
                                    <form action="{{ route('internal_orders.firmar') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <x-jet-input type="hidden" name="signature_id" value="{{$firma->id}}"/>
                                    <div class="col">
                                        <span class="text-xs uppercase">Firma: {{$firma->job}}</span><br>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <x-jet-input type="password" name="key" class="w-flex text-xs"/>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-green">Firmar</button>
                                        </div>
                                    </div>
                                    </form>
                                    @else

                                    <span style="font-size: 17px"> <i style="color : green"  class="fa fa-check-circle" aria-hidden="true"></i> Autorizado por  {{$firma->job}} </span>
                                    <br><br><br><br>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    @endforeach
                    <br>
                    <hr><br>
                    Autorizaciones
                </div>
            </div>
            <br> <br> 
            @if($InternalOrders->status == 'autorizado')
            <br><br><br><br><br>
                        <br><div>PEDIDO 100% AUTORIZADO</div><br>
                                         <!--
                                        <form action="{{ route('internal_orders.pagos', $row->id) }}" method="POST">
                                            @csrf                               
                                            <x-jet-input type="hidden" name="order_id" value="{{$InternalOrders->id }}"/>
                                            <button type="submit" class="btn btn-green">
                                                <i class="fas fa-percent items-center fa-2x"></i> &nbsp; Porcentaje de Avances
                                            </button>
                                        </form>-->

                    @else 
                    <div>FALTAN AUTORIZACIONES</div>
                    @endif
                    <br><br><br>
                </div></div>
                    <input  class="btn btn-green" type="button" name="imprimir" value="Imprimir" id="printPageButton" onclick="window.print();"> 
                    <a href="{{ route('internal_orders.edit_order', $InternalOrders->id) }} " class="btn btn-green btn-sm">
                     <button type = "button" class="btn btn-green "> <i class="fas fa-edit"> &nbsp; Editar</i> </button>
                                    </a></td>
                                    
                    
  
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