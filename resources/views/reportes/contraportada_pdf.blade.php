<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  
    <h1 class="font-bold"> <i class="fas fa-clipboard-check"></i>&nbsp; PEDIDO INTERNO</h1>
    </head>
  <body>
   <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="row p-4">
                <div class="col-sm-12 text-center font-bold text-sm" >
                    <table>
                        <tr><td> &nbsp; &nbsp; &nbsp;</td>
                            <td >
                                <div class="contaier">
                        
                                                <img src="{{asset('img/logo/logo.svg')}}" alt="TYRSA"  style="align-self: left;"></td>
                                                </div></td>
                                 
                            <td rowspan="2">
                        <br>
            Calle Cuernavaca S/N, Col. Ejido del Quemado,<br>
            C.P. 54,963, Tultepec, Edo. México, R.F.C. <br>
            TCO990507S91 Tels: (55) 26472033 / 26473330 <br>
 <div style="text-transform: lowercase;"> info@tyrsa.com.mx www.tyrsa.com.mx</div>     <br>
                        <!-- Domicilio Fiscal:
                                {{$CompanyProfiles->street.' '.$CompanyProfiles->outdoor.' '}}
                                {{$CompanyProfiles->intdoor.' '.$CompanyProfiles->suburb}}
                                <br>{{$CompanyProfiles->city.' '.$CompanyProfiles->state.' '.$CompanyProfiles->zip_code}}<br>
                                R.F.C: {{$CompanyProfiles->rfc}} &nbsp; Tels: 01-52 {{$CompanyProfiles->telephone.', '.$CompanyProfiles->telephone2}} <br> E-mail: {{$CompanyProfiles->email}} &nbsp; Web: {{$CompanyProfiles->website}}
                             -->
                        </td>
                        <td rowspan="2" class="card-body bg-white rounded-xl shadow-md text-center text-sm">
                                <span style="color: darkblue">Numero PI:<br>
                                {{$InternalOrders->invoice}}</span>
                                <br> <br>
                                NOHA: {{$InternalOrders->noha}} 
                                <br> <br>
                                Total: ${{number_format($InternalOrders->total,2)}}
                            </td>
                        </tr>
                        
                            
                        <td  colspan="2"class="text-lg " style="color: red;  width:23%;">{{ $CompanyProfiles->company}}
                        </td>
                        <tr>
                                           
                        </tr >

                    </table>


            
            <h5 class="text-lg text-center text-bold">PEDIDO INTERNO</h5>
            <br>
                    <table>
                    <th colspan="7">Datos del Cliente</th>
                     </tr>
                    <tr class="text-center">
                        <td>
                        <div class="badge badge-danger badge-outlined"> Numero de cliente:</div></td>
                        <td>
                        <div class="badge badge-primary badge-outlined"></div>  </td>
                        <td > <div class="badge badge-danger badge-outlined"> Nombre corto:</div> </td> 
                        <td colspan="2"><div class="badge badge-primary badge-outlined">{{$Customers->alias}} </div></td>
                        <td ><div class="badge badge-danger badge-outlined"> CP:</div> </td>
                        <td> <div class="badge badge-primary badge-outlined">{{$Customers->customer_zip_code}}</div></td>
                    <!-- 6 columas -->
                    </tr>
                  
                    <tr class="text-center">
                        <td><div class="badge badge-danger badge-outlined">  Razon Social: </div></td>
                        <td colspan="6" ><div class="badge badge-primary badge-outlined"> {{$Customers->legal_name}}</div></td>
                        
                        <!-- 6 columas -->
                    </tr>
                    <tr class="text-center">
                        <td><div class="badge badge-danger badge-outlined"> RFC: </div> </td>
                        <td><div class="badge badge-primary badge-outlined"> {{$Customers->customer_rfc}} <div></div> </td>
                        
                        <td><div class="badge badge-danger badge-outlined"> OC: </div></td>
                        <td><div class="badge badge-primary badge-outlined"> @if($InternalOrders->oc==0) - @else
                                                                              {{$InternalOrders->oc}} @endif</div></td>
                        <td> <div class="badge badge-danger badge-outlined">Contrato No.: </div></td>
                        <td colspan="2"> <div class="badge badge-primary badge-outlined" >@if($InternalOrders->ncontrato==0) - @else
                                                                              {{$InternalOrders->ncontrato}} @endif </div></td>
                        <!-- 6 columas -->
                         </tr>
                         
                         <tr class="text-center">
                        <td rowspan="3"><div class="badge badge-danger badge-outlined" ><br> <br> <br> <br>  Domicilio Fiscal:  <br><br><br><br> <br></div></td>
                        <td colspan="6"><div class="badge badge-primary badge-outlined"> {{$Customers->customer_street.' '.$Customers->customer_outdoor.' '.$Customers->customer_intdoor.' '.$Customers->customer_suburb}} <br> {{$Customers->customer_city.' '.$Customers->customer_state.' '.$Customers->customer_zip_code}}<br>
                                                                </td>
                         </tr>
                         <tr>
                            <td></td>
                            <td></td>
                            
                            <td></td>
                            <td  colspan = "3"> <div class="badge badge-danger badge-outlined">
                            Fechas </div></td>

                         </tr>
                          
                    <tr class="text-center">
                        <td></td>
                        <td> <div class="badge badge-danger badge-outlined">Tel:</div></td>
                        <td> <div class="badge badge-primary badge-outlined">{{$Customers->customer_telephone}}</div></td>
                        
                        
                        <td><div class="badge badge-danger badge-outlined">Semanas </div></td>
                        <td><div class="badge badge-danger badge-outlined">Evento </div> </td>
                        <td><div class="badge badge-danger badge-outlined">DD-MM-AA </div></td>
                    </tr >
                    </TABLE>
                    <br><br><br>
                </div></div>
                    
  
        </div>
    </div>
    
    </body>
<style>
@media print {
  #printPageButton {
    display: none;
  }
}
</style>
<style>
    .demo-preview {
  padding-top: 10px;
  padding-bottom: 10px;
  margin: auto;
  text-align: center;
}
.demo-preview .badge{
  margin-right:10px;
}
.badge {
  display: stretch;
  font-size: small;
  font-weight: 600;
  /* padding: 3px 6px; */
  border:3px solid transparent;
  /* min-width: 10px; */
  /* line-height: 1; */
  color: #fff;
  /* text-align: center;*/
  white-space: nowrap; 
  /* vertical-align: middle; */
  border-radius: 4px;
  /* padding: 15px; */
  width: 100%;
  height: 100%;
}

.badge.badge-default {
  background-color: #B0BEC5
}

.badge.badge-primary {
  background-color: #2B416D
}

.badge.badge-secondary {
  background-color: #323a45
}

.badge.badge-success {
  background-color: #64DD17
}

.badge.badge-warning {
  background-color: #FFD600
}

.badge.badge-info {
  background-color: #29B6F6
}

.badge.badge-danger {
  background-color: #9b9b9b;
  border-color: #9b9b9b;
}

.badge.badge-outlined {
  background-color: transparent
}

.badge.badge-outlined.badge-default {
  border-color: #B0BEC5;
  color: #B0BEC5
}

.badge.badge-outlined.badge-primary {
  
  border-color: #9b9b9b;
  color: #000000
}
.badge.badge-outlined.badge-danger {
border-color: #2B416D;
background-color: #2B416D;
  color: #ffffff;
}
.badge.badge-outlined.badge-secondary {
  border-color: #323a45;
  color: #323a45;
}

.badge.badge-outlined.badge-success {
  border-color: #64DD17;
  color: #64DD17
}

.badge.badge-outlined.badge-warning {
  border-color: #FFD600;
  color: #FFD600
}

.badge.badge-outlined.badge-info {
  border-color: #29B6F6;
  color: #29B6F6
}


</style>

</html>