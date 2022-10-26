<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    public function index()
    {
        $Coins = Coin::all();

        return view('admin.coins.index', compact('Coins'));
    }

    public function create()
    {
        return view('admin.coins.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'coin' => 'required|unique:coins,coin',
            'exchange_rate' => 'required|numeric',
        ];

        $messages = [
            'coin.required' => 'Capture el nombre de la Moneda',
            'coin.unique' => '¡La moneda ya ha sido capturada!',
            'exchange_rate.required' => 'Capture el tipo de cambio actual',
            'exchange_rate.numeric' => 'El tipo de cambio debe ser numérico',
        ];

        $request->validate($rules, $messages);

        $date_application = date('Y-m-d');

        $Coins = new Coin();
        $Coins->coin = $request->coin;
        $Coins->symbol = $request->symbol;
        $Coins->code = $request->code;
        $Coins->exchange_rate = $request->exchange_rate;
        $Coins->date_application = $date_application;
        $Coins->save();

        return redirect()->route('coins.index')->with('create_reg', 'ok');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Coins = Coin::find($id);

        return view('admin.coins.show', compact('Coins'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'coin' => 'required',
            'exchange_rate' => 'required|numeric',
        ];

        $messages = [
            'coin.required' => 'Capture el nombre de la Moneda',
            'exchange_rate.required' => 'Capture el tipo de cambio actual',
            'exchange_rate.numeric' => 'El tipo de cambio debe ser numérico',
        ];

        $request->validate($rules, $messages);

        $date_application = date('Y-m-d');

        $Coins = Coin::find($id);
        $Coins->coin = $request->coin;
        $Coins->symbol = $request->symbol;
        $Coins->code = $request->code;
        $Coins->exchange_rate = $request->exchange_rate;
        $Coins->date_application = $date_application;
        $Coins->save();

        return redirect()->route('coins.index')->with('update_reg', 'ok');
    }

    public function destroy($id)
    {
        //
    }
}
