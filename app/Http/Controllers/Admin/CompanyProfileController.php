<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $CompanyProfiles = CompanyProfile::all();

        return view('admin.company_profile.index', compact('CompanyProfiles'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $CompanyProfiles = CompanyProfile::find($id);

        return view('admin.company_profile.show', compact('CompanyProfiles'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'company' => 'required',
            'street' => 'required',
            'outdoor' => 'required',
            'suburb' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'rfc' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
        ];

        $messages = [
            'company.required' => 'Capture el Nombre de la Compañía',
            'street.required' => 'Capture la Calle donde se ubica la Compañía',
            'outdoor.required' => 'Capture el Número Exterior donde se ubica la Compañía',
            'suburb.required' => 'Capture la Colonia donde se ubica la Compañía',
            'city.required' => 'Capture el Municipio donde se ubica la Compañía',
            'state.required' => 'Capture el Estado donde se ubica la Compañía',
            'zip_code.required' => 'Capture el Código Postal donde se ubica la Compañía',
            'rfc.required' => 'Capture el RFC de la Compañía',
            'telephone.required' => 'Capture el Teléfono de contacto de la Compañía',
            'email.required' => 'Capture el Email de la Compañía',
            'email.email' => 'Capture un Email válido',
        ];

        $request->validate($rules, $messages);

        $CompanyProfiles = CompanyProfile::find($id);
        $CompanyProfiles->company = $request->company;
        $CompanyProfiles->motto = $request->motto;
        $CompanyProfiles->street = $request->street;
        $CompanyProfiles->outdoor = $request->outdoor;
        $CompanyProfiles->intdoor = $request->intdoor;
        $CompanyProfiles->suburb = $request->suburb;
        $CompanyProfiles->city = $request->city;
        $CompanyProfiles->state = $request->state;
        $CompanyProfiles->zip_code = $request->zip_code;
        $CompanyProfiles->rfc = $request->rfc;
        $CompanyProfiles->telephone = $request->telephone;
        $CompanyProfiles->telephone2 = $request->telephone2;
        $CompanyProfiles->email = $request->email;
        $CompanyProfiles->website = $request->website;
        $CompanyProfiles->save();

        return redirect()->route('company_profiles.index')->with('update_reg', 'ok');

    }

    public function destroy($id)
    {
        //
    }
}
