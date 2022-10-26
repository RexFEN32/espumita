<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $Units = Unit::all();

        return view('admin.units.index', compact('Units'));
    }

    public function create()
    {
        return view('admin.units.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'unit' => 'required',
        ];

        $messages = [
            'unit.required' => 'Capture la Unidad de Medida',
        ];

        $request->validate($rules, $messages);

        $Units = new Unit();
        $Units->unit = $request->unit;
        $Units->save();

        return redirect()->route('units.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Units = Unit::find($id);

        return view('admin.units.show', compact('Units'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'unit' => 'required',
        ];

        $messages = [
            'unit.required' => 'Capture la Unidad de Medida',
        ];

        $request->validate($rules, $messages);

        $Units = Unit::find($id);
        $Units->unit = $request->unit;
        $Units->save();

        return redirect()->route('units.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        Unit::destroy($id);

        return redirect()->route('units.index')->with('eliminar', 'ok');
    }
}
