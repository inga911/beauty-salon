<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BeautySalon;
use App\Models\Service;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BackController extends Controller
{
    public function index(Request $request, Specialist $specialist)
    {
        $specialists = Specialist::all();
        $beautySalons = BeautySalon::all();
        $services = Service::all();

        $specialists->each(function ($s) use ($request) {
            $showVoteButton = true;
            if ($request->user()) {
                $userId = $request->user()->id;
                foreach ($s->rates as $rate) {
                    if ($rate['userId'] == $userId) {
                        $showVoteButton = false;
                        break;
                    }
                }
            } else {
                $showVoteButton = false;
            }

            $s->votes = count($s->rates);
            $s->showVoteButton = $showVoteButton;
        });

        return view('back.index', [
            'specialists' => $specialists,
            'beautySalons' => $beautySalons,
            'services' => $services,
        ]);
    }
    public function edit(BeautySalon $beautySalon)
    {
        return view('back.edit', [
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


    public function voteFront(Request $request, Specialist $specialist)
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

    
    public function destroy(BeautySalon $beautySalon)
    {
         $beautySalon->delete();

        return redirect()
                ->route('salon-index')
                ->with('ok', 'Salon was deleted successfully');
    }
}
