<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerContact;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $Customers = Customer::all();

        return view('admin.customers.index', compact(
            'Customers',
        ));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'customer' => 'required',
            'customer_rfc' => 'required|max:13',
            'customer_state' => 'required',
            'customer_city' => 'required',
            'customer_suburb' => 'required',
            'customer_street' => 'required',
            'customer_outdoor' => 'required',
            'customer_zip_code' => 'required|max:5',
            'customer_email' => 'required|email',
            'customer_telephone' => 'required|max:10',
        ];

        $messages = [
            'customer.required' => 'Escriba el Nombre del Cliente',
            'customer_rfc.required' => 'Capture el RFC del Cliente',
            'customer_rfc.max' => 'Sólo puede capturar un máximo de 13 caractéres',
            'customer_state.required' => 'Capture el Estado donde se ubica el Cliente',
            'customer_city.required' => 'Capture la Ciudad donde se ubica el Cliente',
            'customer_suburb.required' => 'Capture la Colonia donde se ubica el Cliente',
            'customer_street.required' => 'Capture la dirección donde se ubica el Cliente',
            'customer_outdoor.required' => 'Capture el Número Exterior donde se ubica el Cliente',
            'customer_email.required' => 'Capture la dirección electrónica del Cliente',
            'customer_email.email' => 'Capture una dirección de Email válida',
            'customer_telephone.required' => 'Capture el Número telefónico del CLiente',
            'customer_telephone.max' => 'Capture el Número telefónico a 10 dígitos',
            'customer_zip_code.required' => 'Capture el Código Postal del Cliente',
            'customer_zip_code.max' => 'Sólo puede capturar un máximo de 5 caractéres'
        ];

        $request->validate($rules, $messages);

        $Customers = new Customer();
        $Customers->customer = $request->customer;
        $Customers->customer_rfc = $request->customer_rfc;
        $Customers->customer_state = $request->customer_state;
        $Customers->customer_city = $request->customer_city;
        $Customers->customer_suburb = $request->customer_suburb;
        $Customers->customer_street = $request->customer_street;
        $Customers->customer_outdoor = $request->customer_outdoor;
        $Customers->customer_indoor = $request->customer_indoor;
        $Customers->customer_zip_code = $request->customer_zip_code;
        $Customers->customer_email = $request->customer_email;
        $Customers->customer_telephone = $request->customer_telephone;
        $Customers->save();

        return redirect()->route('customers.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Customers = Customer::find($id);
        $Contacts = CustomerContact::where('customer_id', $id);

        return view('admin.customers.show', compact(
            'Customers', 
            'Contacts'
        ));
    }

    public function update(Request $request, $id)
    {        
        $rules = [
            'customer' => 'required',
            'customer_rfc' => 'required|max:13',
            'customer_state' => 'required',
            'customer_city' => 'required',
            'customer_suburb' => 'required',
            'customer_street' => 'required',
            'customer_outdoor' => 'required',
            'customer_email' => 'required|email',
            'customer_telephone' => 'required|max:10',
            'customer_zip_code' => 'required|max:5',
        ];

        $messages = [
            'customer.required' => 'Escriba el Nombre del Cliente',
            'customer_rfc.required' => 'Capture el RFC del Cliente',
            'customer_rfc.max' => 'Sólo puede capturar un máximo de 13 caractéres',
            'customer_state.required' => 'Capture el Estado donde se ubica el Cliente',
            'customer_city.required' => 'Capture la Ciudad donde se ubica el Cliente',
            'customer_suburb.required' => 'Capture la Colonia donde se ubica el Cliente',
            'customer_street.required' => 'Capture la dirección donde se ubica el Cliente',
            'customer_outdoor.required' => 'Capture el Número Exterior donde se ubica el Cliente',
            'customer_email.required' => 'Capture la dirección electrónica del Cliente',
            'customer_email.email' => 'Capture una dirección de Email válida',
            'customer_telephone.required' => 'Capture el Número telefónico del CLiente',
            'customer_telephone.max' => 'Capture el Número telefónico a 10 dígitos',
            'customer_zip_code.required' => 'Capture el Código Postal del Cliente',
            'customer_zip_code.max' => 'Sólo puede capturar un máximo de 5 caractéres'
        ];

        $request->validate($rules, $messages);

        $Customers = Customer::where('id', $id)->first();
        $Customers->customer = $request->customer;
        $Customers->customer_rfc = $request->customer_rfc;
        $Customers->customer_state = $request->customer_state;
        $Customers->customer_city = $request->customer_city;
        $Customers->customer_suburb = $request->customer_suburb;
        $Customers->customer_street = $request->customer_street;
        $Customers->customer_outdoor = $request->customer_outdoor;
        $Customers->customer_indoor = $request->customer_indoor;
        $Customers->customer_zip_code = $request->customer_zip_code;
        $Customers->customer_email = $request->customer_email;
        $Customers->customer_telephone = $request->customer_telephone;
        $Customers->save();

        return redirect()->route('customers.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        Customer::destroy($id);

        return redirect()->route('customers.index')->with('eliminar', 'ok');
    }
}
