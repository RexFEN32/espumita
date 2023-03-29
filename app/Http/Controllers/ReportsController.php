<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternalOrder;
use App\Models\payments;
use App\Models\Customer;
use App\Models\CompanyProfile;
use App\Models\CustomerShippingAddress;

use App\Models\Seller;
use App\Http\Requests\StorepaymentsRequest;
use App\Http\Requests\UpdatepaymentsRequest;
use SplFileInfo;
use Illuminate\Support\Facades\Storage;
use DB;
use PDF;
use Symfony\Component\Process\Process; 
use Symfony\Component\Process\Exception\ProcessFailedException; 
use Illuminate\Support\Facades\Auth;
class ReportsController extends Controller
{
   public function contraportada_pdf($id){

    
    $CompanyProfiles = CompanyProfile::first();
    $comp=$CompanyProfiles->id;
    $InternalOrders = InternalOrder::find($id);
    $Customers = Customer::find($InternalOrders->customer_id);
    $Sellers = Seller::find($InternalOrders->seller_id);
    $CustomerShippingAddresses = CustomerShippingAddress::find($InternalOrders->customer_shipping_address_id);
    $title='chales';
    
    $pdf = PDF::loadView('reportes.test', compact(
           'title',
           'CompanyProfiles',
           'InternalOrders',
          'Customers',
           'Sellers',
           'CustomerShippingAddresses'));    
    return $pdf->download('disney.pdf');   
    // return view('reportes.contraportada_pdf', compact(
    //     'CompanyProfiles',
    //     'InternalOrders',
    //     'Customers',
    //     'Sellers',
    //     'CustomerShippingAddresses', 
    // ));

   }
   public function pedido_pdf($id){

    
      $CompanyProfiles = CompanyProfile::first();
      $comp=$CompanyProfiles->id;
      $InternalOrders = InternalOrder::find($id);
      $Customers = Customer::find($InternalOrders->customer_id);
      $Sellers = Seller::find($InternalOrders->seller_id);
      $CustomerShippingAddresses = CustomerShippingAddress::find($InternalOrders->customer_shipping_address_id);
      $title='chales';
      
      $pdf = PDF::loadView('reportes.test', compact(
             'title',
             'CompanyProfiles',
             'InternalOrders',
             'Customers',
             'Sellers',
             'CustomerShippingAddresses'));    
      return $pdf->download('Pedido_interno'.$InternalOrders->invoice.'.pdf');   
      // return view('reportes.contraportada_pdf', compact(
      //     'CompanyProfiles',
      //     'InternalOrders',
      //     'Customers',
      //     'Sellers',
      //     'CustomerShippingAddresses', 
      // ));
  
     }
}
