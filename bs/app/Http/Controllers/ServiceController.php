<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::all();
        return view('back.service.index', [
            'service' => $service
        ]);
    }

    public function create()
    {
        $service = Service::all();
        return view('back.service.create', [
            'service' => $service
        ]);
    }

    public function store(Request $request)
    {
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
        return view('back.service.show', [
            'service' => $service
        ]);
    }

    public function edit(Service $service)
    {
        return view('back.service.edit', [
            'service' => $service
        ]);
    }

    public function update(Request $request, Service $service)
    {
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
}
