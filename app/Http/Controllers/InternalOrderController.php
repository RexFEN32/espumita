<?php

namespace App\Http\Controllers;

use App\Models\Authorization;
use App\Models\InternalOrder;
use App\Models\Coin;
use App\Models\CompanyProfile;
use App\Models\Customer;
use App\Models\CustomerShippingAddress;
use App\Models\Item;
use App\Models\Seller;
use App\Models\TempInternalOrder;
use App\Models\TempItem;
use App\Models\vinternal_orders;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\payments;

class InternalOrderController extends Controller
{
    public function index()
    {
        $InternalOrders = vinternal_orders::all();

        return view('internal_orders.index', compact('InternalOrders'));
    }

    public function create()
    {
        $Customers = Customer::all();
        
        return view('internal_orders.create', compact(
            'Customers',
        ));
    }

    public function capture(Request $request)
    {
        $Fecha = date('Y-m-d');
        $TempInternalOrders = TempInternalOrder::where('customer_id', $request->customer_id)->where('date', $Fecha)->get();
        if(count($TempInternalOrders)>0)
        {
            $TempInternalOrders = TempInternalOrder::where('customer_id', $request->customer_id)->where('date', $Fecha)->first();
        }
        else
        {
            $TempInternalOrder = new TempInternalOrder();
            $TempInternalOrder->date = $Fecha;
            $TempInternalOrder->customer_id = $request->customer_id;
            $TempInternalOrder->save();
            $TempInternalOrders = TempInternalOrder::orderBy('id', 'DESC')->first();
        }
        
        $Customers = Customer::where('id', $request->customer_id)->first();
        $CustomerShippingAddresses = CustomerShippingAddress::where('customer_id', $Customers->id)->get();
        $Coins = Coin::all();
        $Sellers = Seller::all();
        
        return view('internal_orders.capture_order', compact(
            'TempInternalOrders',
            'Customers',
            'CustomerShippingAddresses',
            'Coins',
            'Sellers',
        ));
    }

    public function shipment(Request $request)
    {   
        $rules = [
            'customer_id' => 'required',
            'temp_internal_order_id' => 'required',
            'date_delivery' => 'required',
            'instalation_date' => 'required',
            'coin_id' => 'required',
            'payment_conditions'=> 'required',
            'seller_id' => 'required',
        ];

        $messages = [
            'customer_id.required' => 'Los datos del Cliente son necesarios',
            'temp_internal_order_id.required' => 'Existe un error en el pedido',
            'date_delivery.required' => 'La feha de entrega es necesaria',
            'instalation_date.required' => 'La fecha de Instalación es necesaria',
            'coin_id.required' => 'El tipo de Moneda es necesario',
            'payment_conditions.required' => 'Las condiciones de pago son necesarios',
            'seller_id.required' => 'Elija un vendedor',
        ];

        $request->validate($rules, $messages);

        $TempInternalOrders = TempInternalOrder::where('id', $request->temp_internal_order_id)->first();
        $TempInternalOrders->seller_id = $request->seller_id;
        $TempInternalOrders->date_delivery = $request->date_delivery;
        $TempInternalOrders->instalation_date = $request->instalation_date;
        $TempInternalOrders->coin_id = $request->coin_id;
        $TempInternalOrders->payment_conditions = $request->payment_conditions;
        $TempInternalOrders->save();

        $Customers = Customer::where('id', $request->customer_id)->first();
        $CustomerShippingAddresses = CustomerShippingAddress::where('customer_id', $request->customer_id)->get();
        if(count($CustomerShippingAddresses) == 0){
            $CustomerShippingAddresses = new CustomerShippingAddress();
            $CustomerShippingAddresses->customer_id = $Customers->id;
            $CustomerShippingAddresses->customer_shipping_alias = "DOMICILIO FISCAL";
            $CustomerShippingAddresses->customer_shipping_state = $Customers->customer_state;
            $CustomerShippingAddresses->customer_shipping_city = $Customers->customer_city;
            $CustomerShippingAddresses->customer_shipping_suburb = $Customers->customer_suburb;
            $CustomerShippingAddresses->customer_shipping_street = $Customers->customer_street;
            $CustomerShippingAddresses->customer_shipping_outdoor = $Customers->customer_outdoor;
            $CustomerShippingAddresses->customer_shipping_indoor = $Customers->customer_indoor;
            $CustomerShippingAddresses->customer_shipping_zip_code = $Customers->customer_zip_code;
            $CustomerShippingAddresses->save();

            $CustomerShippingAddresses = CustomerShippingAddress::where('customer_id', $request->customer_id)->get();
        }

        return view('internal_orders.capture_order_shippment_addresses', compact(
            'TempInternalOrders',
            'Customers',
            'CustomerShippingAddresses',
        ));
    }

    public function partida(Request $request)
    {
        if($request->shipment == 'Sí'){
            $CustomerShippingAddresses = CustomerShippingAddress::where('id', $request->shipping_address)->first();
        }else{
            $CustomerShippingAddresses = CustomerShippingAddress::where('customer_id', $request->customer_id)->first();
        }

        $TempInternalOrders = TempInternalOrder::where('id', $request->temp_internal_order_id)->first();
        $TempInternalOrders->shipment = $request->shipment;
        $TempInternalOrders->customer_shipping_address_id = $CustomerShippingAddresses->id;
        $TempInternalOrders->save();

        $Customers = Customer::where('id', $request->customer_id)->first();
        $TempItems = TempItem::where('temp_internal_order_id', $TempInternalOrders->id)->get();

        if(count($TempItems) > 0){
            $Subtotal = TempItem::where('temp_internal_order_id', $TempInternalOrders->id)->sum('import');
            $TempItems = TempItem::orderBy('item', 'DESC')->where('temp_internal_order_id', $TempInternalOrders->id)->first();
            $ITEM = $TempItems->item;
        }else{
            $Subtotal = '0';
            // $ITEM = '';
        }

        $Iva = $Subtotal * 0.16;
        $Total = $Subtotal + $Iva;

        return view('internal_orders.capture_order_items', compact(
            'TempInternalOrders',
            'Customers',
            'CustomerShippingAddresses',
            'TempItems',
            'Subtotal',
            'Iva',
            'Total',
            // 'ITEM',
        ));
        
    }

    public function store(Request $request)
    {
        $Id = $request->temp_internal_order_id;
        $TempInternalOrders = TempInternalOrder::find($Id);
        $TempInternalOrders->subtotal = $request->subtotal;
        $TempInternalOrders->iva = $request->iva;
        $TempInternalOrders->total = $request->total;
        $TempInternalOrders->observations = $request->observations;
        $TempInternalOrders->status = 'CAPTURADO';
        $TempInternalOrders->save();

        $InternalOrders = InternalOrder::orderBy('id', 'DESC')->first();
        if($InternalOrders){
            $InternalOrders->invoice;

            $Invoice = $InternalOrders->invoice + 1;
            $InternalOrders = new InternalOrder();
            $InternalOrders->id = $TempInternalOrders->id;
            $InternalOrders->invoice = $Invoice;
            $InternalOrders->date = $TempInternalOrders->date;
            $InternalOrders->customer_id = $TempInternalOrders->customer_id;
            $InternalOrders->seller_id = $TempInternalOrders->seller_id;
            $InternalOrders->date_delivery = $TempInternalOrders->date_delivery;
            $InternalOrders->instalation_date = $TempInternalOrders->instalation_date;
            $InternalOrders->shipment = $TempInternalOrders->shipment;
            $InternalOrders->customer_shipping_address_id = $TempInternalOrders->customer_shipping_address_id;
            $InternalOrders->coin_id = $TempInternalOrders->coin_id;
            $InternalOrders->subtotal = $TempInternalOrders->subtotal;
            $InternalOrders->iva = $TempInternalOrders->iva;
            $InternalOrders->total = $TempInternalOrders->total;
            $InternalOrders->payment_conditions = $TempInternalOrders->payment_conditions;
            $InternalOrders->observations = $TempInternalOrders->observations;
            $InternalOrders->status = $TempInternalOrders->status;
            $InternalOrders->authorization_id = 1;
            $InternalOrders->save();
            

            $TempItems = TempItem::where('temp_internal_order_id', $TempInternalOrders->id)->get();

            foreach($TempItems as $row){
                $Items = new Item();
                $Items->internal_order_id = $row->temp_internal_order_id;
                $Items->item = $row->item;
                $Items->amount = $row->amount;
                $Items->unit = $row->unit;
                $Items->family = $row->family;
                $Items->code = $row->code;
                $Items->description = $row->description;
                $Items->unit_price = $row->unit_price;
                $Items->import = $row->import;
                $Items->save();
            }
            
            $TempItems = TempItem::where('temp_internal_order_id', $TempInternalOrders->id)->get();
            foreach($TempItems as $rs){
                TempItem::destroy($rs->id);
            }

            TempInternalOrder::destroy($TempInternalOrders->id);

            return redirect()->route('internal_orders.index')->with('create_reg', 'ok');

        }else{

            $InternalOrders = new InternalOrder();
            $InternalOrders->id = $TempInternalOrders->id;
            $InternalOrders->invoice = '100';
            $InternalOrders->date = $TempInternalOrders->date;
            $InternalOrders->customer_id = $TempInternalOrders->customer_id;
            $InternalOrders->seller_id = $TempInternalOrders->seller_id;
            $InternalOrders->date_delivery = $TempInternalOrders->date_delivery;
            $InternalOrders->instalation_date = $TempInternalOrders->instalation_date;
            $InternalOrders->shipment = $TempInternalOrders->shipment;
            $InternalOrders->customer_shipping_address_id = $TempInternalOrders->customer_shipping_address_id;
            $InternalOrders->coin_id = $TempInternalOrders->coin_id;
            $InternalOrders->subtotal = $TempInternalOrders->subtotal;
            $InternalOrders->iva = $TempInternalOrders->iva;
            $InternalOrders->total = $TempInternalOrders->total;
            $InternalOrders->payment_conditions = $TempInternalOrders->payment_conditions;
            $InternalOrders->observations = $TempInternalOrders->observations;
            $InternalOrders->status = $TempInternalOrders->status;
            $InternalOrders->authorization_id = 1;
            $InternalOrders->save();

            $TempItems = TempItem::where('temp_internal_order_id', $TempInternalOrders->id)->get();

            foreach($TempItems as $row){
                $Items = new Item();
                $Items->internal_order_id = $row->temp_internal_order_id;
                $Items->item = $row->item;
                $Items->amount = $row->amount;
                $Items->unit = $row->unit;
                $Items->family = $row->family;
                $Items->code = $row->code;
                $Items->description = $row->description;
                $Items->unit_price = $row->unit_price;
                $Items->import = $row->import;
                $Items->save();
            }
            
            $TempItems = TempItem::where('temp_internal_order_id', $TempInternalOrders->id)->get();
            foreach($TempItems as $rs){
                TempItem::destroy($rs->id);
            }

            TempInternalOrder::destroy($TempInternalOrders->id);

            return redirect()->route('internal_orders.index')->with('create_reg', 'ok');

        }        
    }

    public function show($id)
    {
        $CompanyProfiles = CompanyProfile::first();
        $InternalOrders = InternalOrder::find($id);
        $Customers = Customer::find($InternalOrders->customer_id);
        $Sellers = Seller::find($InternalOrders->seller_id);
        $CustomerShippingAddresses = CustomerShippingAddress::find($InternalOrders->customer_shipping_address_id);
        $Coins = Coin::find($InternalOrders->coin_id);
        $Items = Item::where('internal_order_id', $id)->get();

        $Subtotal = $InternalOrders->subtotal;

        $Authorizations = Authorization::where('id', '<>', 1)->orderBy('clearance_level', 'ASC')->get();

        return view('internal_orders.show', compact(
            'CompanyProfiles',
            'InternalOrders',
            'Customers',
            'Sellers',
            'CustomerShippingAddresses',
            'Coins',
            'Items',
            'Authorizations',
            'id',
        ));
    }
//recibe el id de la orden
    public function payment($id)
    {
        
        $CompanyProfiles = CompanyProfile::first();
        $InternalOrders = InternalOrder::find($id);

        $Customers = Customer::find($InternalOrders->customer_id);
        $Sellers = Seller::find($InternalOrders->seller_id);
        $CustomerShippingAddresses = CustomerShippingAddress::find($InternalOrders->customer_shipping_address_id);
        $Coins = Coin::find($InternalOrders->coin_id);
        $Items = Item::where('internal_order_id', $id)->get();

        $Subtotal = $InternalOrders->subtotal;
        
        $Authorizations = Authorization::where('id', '<>', 1)->orderBy('clearance_level', 'ASC')->get();
        
        $actualized = " ";
        return view('internal_orders.payment', compact(
            'CompanyProfiles',
            'InternalOrders',
            'Customers',
            'Sellers',
            'CustomerShippingAddresses',
            'Coins',
            'Items',
            'Authorizations',
            'Subtotal',
            'id',
            'actualized',
        ));

    }
    
    
    public function pay_conditions(Request $request)
    {
        $CompanyProfiles = CompanyProfile::first();
        $InternalOrders = InternalOrder::find($request->order_id);
        $Customers = Customer::find($request->customerID);
        $Sellers = Seller::find($request->sellerID);
        $CustomerShippingAddresses = CustomerShippingAddress::find($request->customerAdressID);
        $Coins = Coin::find($request->coinID);
        $Items = Item::where('internal_order_id', $request->order_id)->get();
        $actualized='';
        $Subtotal = $request->subtotal;
        
        $porcentaje1=$request->porcentaje1;
        $nota1=$request->nota1;
        $date1=$request->date1;
        $nRows = $request->rowcount;
        $payments = payments::where('order_id', $request->order_id)->delete();
        for($i=1; $i <= $nRows; $i++) {
             
            $this_payment= new payments();
            $this_payment->order_id = $request->order_id;
            $this_payment->concept = $request->get('concepto')[$i];
            $this_payment->percentage = $request->get('porcentaje')[$i];
            $this_payment->amount = (float)$Subtotal*(float)$this_payment->percentage*0.116;
            $this_payment->date = $request->get('date')[$i];
            $this_payment->nota = $request->get('nota')[$i];
            $this_payment->save();
        }
        $Authorizations = Authorization::where('id', '<>', 1)->orderBy('clearance_level', 'ASC')->get();

        #ahora hay que traer de la base de datos lo que se acaba de guardar
        $payments = payments::where('order_id', $request->order_id)->get();

        $pago1 = $payments->first()->date;
        return view('internal_orders.store_payment', compact(
            'CompanyProfiles',
            'InternalOrders',
            'Customers',
            'Sellers',
            'CustomerShippingAddresses',
            'Coins',
            'Items',
            'Authorizations',
            'Subtotal',
            'actualized',
            'nRows',
            'payments',
            'pago1',
        ));
        

    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}