@extends('layouts.app')

@section('content')
    <h1>show - salon</h1>
    <div class="form" style="border: 1px solid black; width:50%">

            <div class="mb-3">
                <label class="form-label">Salon name: {{ $beautySalon->salon_name }}</label>
            </div>
            <div class="mb-3">
                <label class="form-label">Salon Address: {{ $beautySalon->address }}</label>
            </div>
            <div class="mb-3">
                <label class="form-label">Salon city: {{ $beautySalon->city }}</label>
            </div>
            <div class="mb-3">
                <label class="form-label">Salon phone number: {{ $beautySalon->phone_number }}</label>
            </div>


    </div>
@endsection
