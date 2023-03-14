@extends('adminlte::page')

@section('title', 'PARTIDAS')

@section('content_header')
    <h1 class="font-bold"><i class="fa-brands fa-buffer"></i>&nbsp; Partida</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Agregar Partida:
            </h5>
        </div>
        <form action="{{ route('temp_items.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-jet-input type="hidden" name="temp_internal_order_id" value="{{ $TempInternalOrders }}"/>
        <x-jet-input type="hidden" name="item" value="{{ $Item }}"/>
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="row p-4">
                <div class="col-sm-12 col-xs-12 shadow rounded-xl p4">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <x-jet-label value="* Cantidad" />
                                <x-jet-input type="number" name="amount" class="w-full text-xs" value="{{old('amount')}}"/>
                                <x-jet-input-error for='amount' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Unidad" />
                                {{--  <x-jet-input type="text" name="unit" class="w-full text-xs" value="{{old('unit')}}"/>  --}}
                                <select class="form-capture  w-full text-xs uppercase" name="unit">
                                    @foreach ($Units as $row)
                                        <option value="{{$row->unit}}" @if ($row->id == old('unit')) selected @endif >{{$row->unit}}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for='unit' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Categoria" />
                                <select class="form-capture  w-full text-xs uppercase" name="category" id='cat'>
                                        
                                        <option value=" " > </option>
                                        <option value="Productos" >Productos</option>
                                        <option value="Servicios" >Servicios</option>
                                        <option value="Integracion" >Integracion</option>
                                       
                                    
                                </select>
                                <x-jet-input-error for='family' /> 
                            <div class="form-group">
                                <x-jet-label value="* Descripción" />
                                <select class="form-capture  w-full text-xs uppercase" name="description" id='desc'>
                                    
                                </select><x-jet-input-error for='description' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Familia" />
                                {{--  <x-jet-input type="text" name="family" class="w-full text-xs" value="{{old('family')}}"/>  --}}
                                <select class="form-capture  w-full text-xs uppercase" name="family" id='fam'>
                                        
                                        <option value=" " > </option>
                                        <option value="FAB" >Fabricado por Tyrsa</option>
                                        <option value="COM" >Comercializado por Tyrsa</option>
                                        <option value="DTOS" >Directos</option>
                                        <option value="SUBC" >Subcontratados</option>
                                        <option value="F+D" >Fabricado e instalado por tyrsa</option>
                                        <option value="F+S" >Fabricado por tyrsa e instalado por Subcontratista</option>
                                        <option value="C+D" >Comercializado e instalado por tyrsa</option>
                                        <option value="C+S" >Comercializado por tyrsa e instalado por subcontratista</option>
                                    
                                    
                                </select>
                                <x-jet-input-error for='family' /> 
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Sub Familia" />
                                {{--  <x-jet-input type="text" name="subfamily" class="w-full text-xs" value="{{old('family')}}"/>  --}}
                                <select class="form-capture  w-full text-xs uppercase" name="subfamily" id='subfam'>
                                    
                                </select>
                                <x-jet-input-error for='family' /> 
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Productos" />
                                {{--  <x-jet-input type="text" name="subfamily" class="w-full text-xs" value="{{old('family')}}"/>  --}}
                                <select class="form-capture  w-full text-xs uppercase" name="products" id='prod'>
                                    
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Clave" />
                                <x-jet-input type="text" name="code" class="w-full text-xs" value="{{old('code')}}" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                <x-jet-input-error for='code' />
                            </div>
                            <!-- <div class="form-group">
                                <x-jet-label value="* Fabricación" />
                                <x-jet-input type="text" name="fab" class="w-full text-xs" value="{{old('fab')}}" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                <x-jet-input-error for='fab' />
                            </div>
                            <div class="form-group">
                                <x-jet-label value="* Racks" />
                                <x-jet-input type="text" name="racks" class="w-full text-xs" value="{{old('racks')}}" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                <x-jet-input-error for='racks' /> 
                            </div> -->
                            <div class="form-group">
                                <x-jet-label value="* SKU" />
                                <x-jet-input type="text" name="sku" class="w-full text-xs" value="{{old('sku')}}" onkeyup="javascript:this.value=this.value.toUpperCase();"/>
                                <x-jet-input-error for='sku' />
                            </div>
                            
                            <div class="form-group">
                                <x-jet-label value="* Precio Unitario" />
                                <x-jet-input type="number" step="0.01" name="unit_price" id="input-price" class="form-control just-number price-format-input" class="w-full text-xs" value="{{old('unit_price')}}"/>
                                <x-jet-input-error for='unit_price' />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                {{--  <a href="{{ route('customers.index')}}" class="btn btn-black mb-2">
                    <i class="fas fa-times fa-2x"></i>&nbsp;&nbsp; Cancelar
                </a>  --}}
                <button type="submit" class="btn btn-green mb-2">
                    <i class="fas fa-save fa-2x"></i>&nbsp; &nbsp; Guardar
                </button>
            </div>
        </div>
        </form>
    </div>
@stop

@section('css')
    
@stop

@section('js')
<script>
$(document).on("keypress", ".just-number", function (e) {
  let charCode = (e.which) ? e.which : e.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
});
$(document).on('keyup', '.price-format-input', function (e) {
  let val = this.value;
  val = val.replace(/,/g, "");
  if (val.length > 3) {
    let noCommas = Math.ceil(val.length / 3) - 1;
    let remain = val.length - (noCommas * 3);
    let newVal = [];
    for (let i = 0; i < noCommas; i++) {
      newVal.unshift(val.substr(val.length - (i * 3) - 3, 3));
    }
    newVal.unshift(val.substr(0, remain));
    this.value = newVal;
  }
  else {
    this.value = val;
  }
});

$(document).ready(function(){
  $('#input-price').focus();
})</script>

<script>
function removeOptions(selectElement) {
   var i, L = selectElement.options.length - 1;
   for(i = L; i >= 0; i--) {
      selectElement.remove(i);
   }
}

// using the function:
    $(document).ready(function () {     
$('#fam').change(function(){
var seleccionado = $(this).val();
console.log('entrando a la funcion');
console.log(seleccionado)
removeOptions(document.getElementById('subfam'));
var subfam = document.getElementById("subfam");
if(seleccionado=='FAB'){
    var example_array = {
    RACK : 'Racks',
    TRANSPORTADORES : 'Transportadores',
    ESPECIALES : 'Especiales Otros'
};}
if(seleccionado=='COM'){
    var example_array = {
    NACIONAL_RACK : ' Nacional Racks',
    NACIONAL_TRANSPORTADORES : 'Nacional Transportadores',
    NACIONAL_ESPECIALES : 'Nacional Especiales Otros',
    IMPORTADO_RACKS : ' importado Racks',
    IMPORTADO_TRANSPOTADORES : 'importado Transportadores',
    IMPORTADO_ESPECIALES : 'importado Especiales Otros'
};}

if(seleccionado=='COM'){
    var example_array = {
    NACIONAL_RACKS_ : ' Nacional Racks',
    NACIONAL_TRANSPORTADORES_ : 'Nacional Transportadores',
    NACIONAL_ESPECIALES_ : 'Nacional Especiales Otros',
    IMPORTADI_RACKS_ : ' importado Racks',
    IMPORTADO_TRANSPORTADORES_ : 'importado Transportadores',
    IMPORTADO_ESPECIALES_ : 'importado Especiales Otros'
};}
if(seleccionado=='DTOS'){
    var example_array = {
    RACKS : 'Racks',
    TRANSPORTADORES_ : 'Transportadores',
    ESPECIALES_ : 'Especiales Otros'
    
};}
if(seleccionado=='SUBC'){
    var example_array = {
    NACIONAL_RACKS : ' Nacional Racks',
    NACIONAL_TRANSPORTADORES : 'Nacional Transportadores',
    NACIONAL_ESPECIALES : 'Nacional Especiales Otros',
    IMPORTADI_RACKS : ' importado Racks',
    IMPORTADO_TRANSPORTADORES : 'importado Transportadores',
    IMPORTADO_ESPECIALES : 'importado Especiales Otros'
};
}

if(seleccionado=='F+D'){
    var example_array = {
    RACKS : 'Racks',
    TRANSPORTADORES_ : 'Transportadores',
    ESPECIALES_ : 'Especiales Otros'
    
};}

if(seleccionado=='F+S'){
    var example_array = {
    NACIONAL_RACKS : ' Nacional Racks',
    NACIONAL_TRANSPORTADORES : 'Nacional Transportadores',
    NACIONAL_ESPECIALES : 'Nacional Especiales Otros',
    
};}

if(seleccionado=='C+S'){
    var example_array = {
    NACIONAL_RACKS : ' Nacional Racks',
    NACIONAL_TRANSPORTADORES : 'Nacional Transportadores',
    NACIONAL_ESPECIALES : 'Nacional Especiales Otros',
    IMPORTADI_RACKS : ' importado Racks',
    IMPORTADO_TRANSPORTADORES : 'importado Transportadores',
    IMPORTADO_ESPECIALES : 'importado Especiales Otros'
};
}

if(seleccionado=='C+D'){
    var example_array = {
        NACIONAL_RACKS : ' Nacional Racks',
    NACIONAL_TRANSPORTADORES : 'Nacional Transportadores',
    NACIONAL_ESPECIALES : 'Nacional Especiales Otros',
    IMPORTADI_RACKS : ' importado Racks',
    IMPORTADO_TRANSPORTADORES : 'importado Transportadores',
    IMPORTADO_ESPECIALES : 'importado Especiales Otros'
};
}


for(index in example_array) {
    subfam.options[subfam.options.length] = new Option(example_array[index], index);
}
var seleccionado = $(this).val();
console.log('entrando a la funcion');
console.log(seleccionado)
removeOptions(document.getElementById('prod'));
var prod = document.getElementById("prod");
var example_array = {
    INS_MECANICA : 'Ins. Mecanica',
    INS_ELECTRICA : 'Ins. Mecanica',
    ING_MECANICA : 'Ing. Mecanica',
    ING_ELECTRICA : 'Ing. Electrica',
    ING_INDUSTRIAL : 'Ing. Industrial',
    CONSULTORIA : 'consultoria',
    FLETES : 'fletes',
    OTROS_SERVICIOS : 'Otros Servicios',};
if(seleccionado=='RACK'){
    var example_array = {
    estanteria : 'Estanteria',
    mini_rack : 'Mini Rack',
    drive: 'Drive ',
    push_back: 'Push Back ',
    dinamico: 'Dinamico ',
    
};}
if(seleccionado=='RACKS'){
    var example_array = {
    subcontratistas : 'Subcontratistas',
    ins_mecanica : 'Ins. Mecanica',
    ins_electrica : 'Ins. Mecanica',
    ing_mecanica : 'Ing. Mecanica',
    ing_electrica : 'Ing. Electrica',
    ing_industrial : 'Ing. Industrial',
    consultoria : 'consultoria',
    fletes : 'fletes',
    otros_servicios : 'Otros Servicios',
    
};}
if(seleccionado=='TRANSPORTADORES'){
    var example_array = {
    GR : 'GR',
    GW : 'GW',
    SB_BOR: 'SB/BOR ',
    LBRD: 'LRBD',
    
};}
if(seleccionado=='ESPECIALES'){
    var example_array = {
    
    XTYRSA : 'Xtyrsa',
    XCLIENTE : 'Xcliente',
    
};}

if(seleccionado=='NACIONAL_RACKS_'){
    var example_array = {
    POR_DEFINIR : 'POR DEFINIR',
};}
if(seleccionado=='NACIONAL_TRANSPORTADORES_'){
    var example_array = {
    POR_DEFINIR : 'POR DEFINIR',
};}
if(seleccionado=='NACIONAL_ESPECIALES_'){
    var example_array = {
    LINEA_MERIK : 'LINEA MERIK',
};}
if(seleccionado=='IMPORTADO_RACKS_'){
    var example_array = {
    POR_DEFINIR : 'POR DEFINIR',
};}
if(seleccionado=='IMPORTADO_TRANSPORTADORES_'){
    var example_array = {
    LINEA_ASCI : 'LINEA ASCI',
    LINEA_DAIFUKU : 'LINEA DAIFUKU',
    LINEA_WASP : 'LINEA WASP',
    LINEA_NESTAFLEX : 'LINEA NESTAFLEX',
    LINEA_RYSON : 'LINEA RYSON',
    LINEA_OTROS : 'LINEA OTROS'

};}
if(seleccionado=='IMPORTADO_ESPECIALES_'){
    var example_array = {
    LINEA_MERIK : 'LINEA MERIK',
};}

for(index in example_array) {
    prod.options[prod.options.length] = new Option(example_array[index], index);
}

})
});
</script>

<script>
     $(document).ready(function () {     
$('#cat').change(function(){
var seleccionado = $(this).val();
console.log('entrando a la funcion');
console.log(seleccionado)
removeOptions(document.getElementById('desc'));
var desc = document.getElementById("desc");
if(seleccionado=='Productos'){
    var example_array = {
    fabricacion : 'Fabricacion',
    comercializacion : 'Comercializacion',
    
};}
if(seleccionado=='Servicios'){
    var example_array = {
    tyrsadir : 'Tyrsa Directo',
    subcon : 'Subcontratistas',
    
};}
if(seleccionado=='Integracion'){
    var example_array = {
        tyrsadir : 'Tyrsa Directo',
    subcon : 'Subcontratistas',
    
};}

for(index in example_array) {
    desc.options[desc.options.length] = new Option(example_array[index], index);
}

})
     });
</script>

<script>
     $(document).ready(function () {     
$('#subfam').change(function(){
var seleccionado = $(this).val();
console.log('entrando a la funcion');
console.log(seleccionado)
removeOptions(document.getElementById('prod'));
var prod = document.getElementById("prod");
var example_array = {
    INS_MECANICA : 'Ins. Mecanica',
    INS_ELECTRICA : 'Ins. Mecanica',
    ING_MECANICA : 'Ing. Mecanica',
    ING_ELECTRICA : 'Ing. Electrica',
    ING_INDUSTRIAL : 'Ing. Industrial',
    CONSULTORIA : 'consultoria',
    FLETES : 'fletes',
    OTROS_SERVICIOS : 'Otros Servicios',};
if(seleccionado=='RACK'){
    var example_array = {
    estanteria : 'Estanteria',
    mini_rack : 'Mini Rack',
    drive: 'Drive ',
    push_back: 'Push Back ',
    dinamico: 'Dinamico ',
    
};}
if(seleccionado=='RACKS'){
    var example_array = {
    subcontratistas : 'Subcontratistas',
    ins_mecanica : 'Ins. Mecanica',
    ins_electrica : 'Ins. Mecanica',
    ing_mecanica : 'Ing. Mecanica',
    ing_electrica : 'Ing. Electrica',
    ing_industrial : 'Ing. Industrial',
    consultoria : 'consultoria',
    fletes : 'fletes',
    otros_servicios : 'Otros Servicios',
    
};}
if(seleccionado=='TRANSPORTADORES'){
    var example_array = {
    GR : 'GR',
    GW : 'GW',
    SB_BOR: 'SB/BOR ',
    LBRD: 'LRBD',
    
};}
if(seleccionado=='ESPECIALES'){
    var example_array = {
    
    XTYRSA : 'Xtyrsa',
    XCLIENTE : 'Xcliente',
    
};}

if(seleccionado=='NACIONAL_RACKS_'){
    var example_array = {
    POR_DEFINIR : 'POR DEFINIR',
};}
if(seleccionado=='NACIONAL_TRANSPORTADORES_'){
    var example_array = {
    POR_DEFINIR : 'POR DEFINIR',
};}
if(seleccionado=='NACIONAL_ESPECIALES_'){
    var example_array = {
    LINEA_MERIK : 'LINEA MERIK',
};}
if(seleccionado=='IMPORTADO_RACKS_'){
    var example_array = {
    POR_DEFINIR : 'POR DEFINIR',
};}
if(seleccionado=='IMPORTADO_TRANSPORTADORES_'){
    var example_array = {
    LINEA_ASCI : 'LINEA ASCI',
    LINEA_DAIFUKU : 'LINEA DAIFUKU',
    LINEA_WASP : 'LINEA WASP',
    LINEA_NESTAFLEX : 'LINEA NESTAFLEX',
    LINEA_RYSON : 'LINEA RYSON',
    LINEA_OTROS : 'LINEA OTROS'

};}
if(seleccionado=='IMPORTADO_ESPECIALES_'){
    var example_array = {
    LINEA_MERIK : 'LINEA MERIK',
};}

for(index in example_array) {
    prod.options[prod.options.length] = new Option(example_array[index], index);
}
})
     });
</script>
@stop