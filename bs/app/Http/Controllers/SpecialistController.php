<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use App\Http\Controllers\Controller;
use App\Models\BeautySalon;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialistController extends Controller
{
    public function index(Request $request)
    {
        $specialists = Specialist::all();

        $specialists->map(function($s) use($request) {
            if (!$request->user()) {
                $showVoteButton = false;
            } else {
                $rates = collect($s->rates);
                $showVoteButton = $rates->first(fn($r) => $r['userId'] == $request->user()->id) ? false : true;
            }
            $s->votes = count($s->rates);
            $s->showVoteButton = $showVoteButton;
        });
            return view('back.specialist.index', [
            'specialists' => $specialists
        ]);
    }

    public function create()
    {
        $specialists = Specialist::all();
        $beautySalons = BeautySalon::all();
        $services = Service::all();
        return view('back.specialist.create', [
            'specialists' => $specialists,
            'beautySalons' => $beautySalons,
            'services' => $services
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'surname' => 'required|min:3|max:20',
            'service_id' => 'required|exists:services,id',
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
        $specialist->beauty_salon_id = $request->beauty_salon_id ?? 0;
        $specialist->service_id =  $request->service_id;

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

    public function vote(Request $request, Specialist $specialist)
    {
        if ($request->user()) {
            $userId = $request->user()->id;
            $rates = collect($specialist->rates);

            if (!$rates->first(fn($r) => $r['userId'] == $userId) && $request->star) {
                $stars = count($request->star);
                
                $userRate = [
                    'userId' => $userId,
                    'rate' => $stars
                ];
                $rates->add($userRate);
                $rate = round($rates->sum('rate') / $rates->count(), 2);

                $specialist->update([
                    'rate' => $rate,
                    'rates' => $rates,
                ]);
                
            }

            return redirect()->back();
        }
        
    }

    // public function salons(Request $request)
    // {
    //     $beautySalons = BeautySalon::where('id', $request->beautySalons)->first()->beautySalons;

    //     $html = view('back.specialist.salons')
    //         ->with(['beautySalons' => $beautySalons])
    //         ->render();

    //     return response()->json([
    //         'html' => $html,
    //         'message' => 'OK',
    //     ]);
    // }

    // public function salonName(Request $request, BeautySalon $beautySalon)
    // {
    //     return response()->json([]);
    // }


}
