<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialist;
use App\Models\BeautySalon;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $specialists = Specialist::all();
        $beautySalons = BeautySalon::all();
        $services = Service::all();
        return view('home', [
            'specialists' => $specialists,
            'beautySalons' => $beautySalons,
            'services' => $services
        ]);
    }
    public function create()
    {
        $specialists = Specialist::all();
        $beautySalons = BeautySalon::all();
        $services = Service::all();
        return view('front.specialist.create', [
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
        $specialist->service_id =  $request->service_id ?? 0;
        // $specialist->service_title = Service::findOrFail($request->service_id)->service_title;

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

}
