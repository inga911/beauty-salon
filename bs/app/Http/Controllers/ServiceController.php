<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Specialist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::all();
        return view('front.service.index', [
            'service' => $service
        ]);
    }

    public function create()
    {
        $service = Service::all();
        return view('front.service.create', [
            'service' => $service
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_title' => 'required|min:3|max:100',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        $service = new Service;
        $service->service_title = $request->service_title;
        $service->duration = $request->duration;
        $service->price = $request->price;
        $service->save();
        return redirect()
            ->route('service-index')
            ->with('ok', 'New service was added');
    }


    public function show(Service $service)
    {
        return view('front.service.show', [
            'service' => $service
        ]);
    }

    public function edit(Service $service)
    {
        return view('front.service.edit', [
            'service' => $service
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $validator = Validator::make($request->all(), [
            'service_title' => 'required|min:3|max:100',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }
    
        $service->service_title = $request->service_title;
        $service->duration = $request->duration;
        $service->price = $request->price;
        $service->save();
    
        return redirect()
            ->route('service-index')
            ->with('ok', 'The service was edited');
    }
    
    public function destroy(Service $service)
    {
         $service->delete();

        return redirect()
                ->route('service-index')
                ->with('ok', 'service was deleted successfully');
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
}
