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
                

               


                <table class="table table-striped">
  <thead class="thead">
    <tr>
      <th scope="col">Cliente</th>
      <th > Orden</th>
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
                                <td> <p>Cliente de prueba 01</p></td>
                                <td> {{ $row->order_id}}</td>
                                <td> {{ $row->concept }}</td>
                                <td>{{ $row->amount }}</td>
                                <td>{{ $row->date}} </td>
                               
                                <td>{{ $row->nota }}</td>
                                <td><span class="badge badge-info">{{ $row->status }}</span></td>
                                
                            </tr>
                            @endforeach
  
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    
@stop

@section('js')



@stop