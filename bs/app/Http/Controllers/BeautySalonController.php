<?php

namespace App\Http\Controllers;

use App\Models\BeautySalon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeautySalonController extends Controller
{
    public function index()
    {
        $beautySalons = BeautySalon::all();
        
        return view('back.salon.index', [
            'beautySalons' => $beautySalons
        ]);
    }

    public function create()
    {
        $bs = BeautySalon::all();
        return view('back.salon.create', [
            'bs' => $bs
        ]);
    }

    public function store(Request $request)
    {
        $bs = new BeautySalon;
        $bs->salon_name = $request->salon_name;
        $bs->address = $request->address;
        $bs->city = $request->city;
        $bs->phone_number = $request->phone_number;
        $bs->save();
        return redirect()
            ->route('salon-index')
            ->with('ok', 'New salon was added');
    }


    public function show(BeautySalon $beautySalon)
    {
        return view('back.salon.show', [
            'beautySalon' => $beautySalon
        ]);
    }

    public function edit(BeautySalon $beautySalon)
    {
        return view('back.salon.edit', [
            'beautySalon' => $beautySalon
        ]);
    }

    public function update(Request $request, BeautySalon $beautySalon)
    {
        $beautySalon->salon_name = $request->salon_name;
        $beautySalon->address = $request->address;
        $beautySalon->city = $request->city;
        $beautySalon->phone_number = $request->phone_number;
        $beautySalon->save();
        return redirect()
            ->route('salon-index')
            ->with('ok', 'The salon was edited');
    }

    public function destroy(BeautySalon $beautySalon)
    {
         $beautySalon->delete();

        return redirect()
                ->route('salon-index')
                ->with('ok', 'Salon was deleted successfully');
    }
}
