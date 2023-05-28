@extends('layouts.app')

@section('content')
    <h1>edit </h1>
    <div class="form" style="border: 1px solid black; ">

        <form action="{{ route('salon-update', $beautySalon) }}" method="post">
            <div class="mb-3">
                <label class="form-label">Salon name</label>
                <input type="text" class="form-control" name="salon_name" value="{{old('salon_name', $beautySalon->salon_name)}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Salon Address</label>
                <input type="text" class="form-control" name="address" value="{{old('address', $beautySalon->address)}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Salon city</label>
                <input type="text" class="form-control" name="city" value="{{old('city', $beautySalon->city)}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Salon phone number</label>
                <input type="text" class="form-control" name="phone_number" value="{{old('phone_number', $beautySalon->phone_number)}}">
            </div>
            <button type="submit" class="btn btn-primary">Yes, edit it</button>
            @csrf
            @method('put')
        </form>
    </div>
@endsection
