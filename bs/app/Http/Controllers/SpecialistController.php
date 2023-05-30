<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use App\Http\Controllers\Controller;
use App\Models\BeautySalon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialists = Specialist::all();
        return view('back.specialist.index', [
            'specialists' => $specialists
        ]);
    }

    public function create()
    {
        $specialists = Specialist::all();
        // $bs = BeautySalon::all();
        return view('back.specialist.create', [
            'specialists' => $specialists,
            // 'bs' => $bs
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'surname' => 'required|min:3|max:20',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }

        $specialist = new Specialist;
        $specialist->name = $request->name;
        $specialist->surname = $request->surname;
        // $specialist->beauty_salon_id = $request->beauty_salon_id;

        $photo = $request->file('photo');
        if ($photo) {
            $photoName = rand(100000000, 999999999) . '-' . $photo->getClientOriginalName();
            $path = public_path('img');
            $photo->move($path, $photoName);
            $specialist->photo = $photoName;
        }

        $specialist->save();
        return redirect()
            ->route('specialist-index')
            ->with('ok', 'New specialist was added');
    }



    public function show(Specialist $specialist)
    {
        return view('back.specialist.show', [
            'specialist' => $specialist
        ]);
    }

    public function edit(Specialist $specialist)
    {
        return view('back.specialist.edit', [
            'specialist' => $specialist,
        ]);
    }

    public function update(Request $request, Specialist $specialist)
    {
        $specialist->name = $request->name;
        $specialist->surname = $request->surname;
        // $specialist->beautySalons = $request->beautySalons;
        $specialist->save();
        return redirect()
            ->route('specialist-index')
            ->with('ok', 'The specialist was edited');
    }

    public function destroy(Specialist $specialist)
    {
        $specialist->delete();

        return redirect()
            ->route('specialist-index')
            ->with('ok', 'specialist was deleted successfully');
    }

    public function salons(Request $request)
    {
        $beautySalons = BeautySalon::where('id', $request->beautySalons)->first()->beautySalons;

        $html = view('back.specialist.salons')
            ->with(['beautySalons' => $beautySalons])
            ->render();

        return response()->json([
            'html' => $html,
            'message' => 'OK',
        ]);
    }

    public function salonName(Request $request, BeautySalon $beautySalon)
    {
        return response()->json([]);
    }
}
