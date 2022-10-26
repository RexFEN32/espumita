<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index()
    {
        $Families = Family::all();

        return view('admin.families.index', compact('Families'));
    }

    public function create()
    {
        return view('admin.families.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'family' => 'required',
        ];

        $messages = [
            'family.required' => 'Capture el nombre de la Familia',
        ];

        $request->validate($rules, $messages);

        $Families = new Family();
        $Families->family = $request->family;
        $Families->save();

        return redirect()->route('families.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Families = Family::find($id);

        return view('admin.families.show', compact('Families'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'family' => 'required',
        ];

        $messages = [
            'family.required' => 'Capture el nombre de la Familia',
        ];

        $request->validate($rules, $messages);

        $Families = Family::find($id);
        $Families->family = $request->family;
        $Families->save();

        return redirect()->route('families.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        Family::destroy($id);

        return redirect()->route('families.index')->with('eliminar', 'ok');
    }
}
