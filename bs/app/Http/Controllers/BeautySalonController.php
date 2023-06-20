<?php

namespace App\Http\Controllers;

use App\Models\BeautySalon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeautySalonController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->sort ?? '';
        $filter = $request->filter ?? '';

        $beautySalons = BeautySalon::query();


        switch ($filter) {
            case 'all':
                break;
            case 'have_spec':
                $beautySalons->has('specialists');
                break;
            case 'dont_have_spec':
                $beautySalons->doesntHave('specialists');
                break;
        }


        switch ($sort) {
            case 'name_asc':
                $beautySalons->orderBy('salon_name', 'asc');
                break;
            case 'name_desc':
                $beautySalons->orderBy('salon_name', 'desc');
                break;
            case 'city_name_asc':
                $beautySalons->orderBy('city', 'asc');
                break;
            case 'city_name_desc':
                $beautySalons->orderBy('city', 'desc');
                break;
        }

        $beautySalons = $beautySalons->get();

        return view('front.salon.index', [
            'beautySalons' => $beautySalons,
            'sortSelect' => BeautySalon::SORT,
            'sort' => $sort,
            'filterSelect' => BeautySalon::FILTER,
            'filter' => $filter,
        ]);
    }


    public function create()
    {
        $bs = BeautySalon::all();
        return view('front.salon.create', [
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
        return view('front.salon.show', [
            'beautySalon' => $beautySalon
        ]);
    }

    public function edit(BeautySalon $beautySalon)
    {
        return view('front.salon.edit', [
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
