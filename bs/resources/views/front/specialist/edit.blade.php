@extends('layouts.app')

@section('content')
    <h1>edit - specialist</h1>
    <div class="form" style="border: 1px solid black; ">

        <form action="{{ route('specialist-update',$specialist) }}" method="post">
            <div class="mb-3">
                <label class="form-label">Specialist name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $specialist->name) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Specialist surname</label>
                <input type="text" class="form-control" name="surname" value="{{ old('surname', $specialist->surname) }}">
            </div>
            {{-- <div class="mb-3">
                <label class="form-label">Salons list</label>
                <select class="form-select --salon--select" name="beauty_salon_id" data-url="{{ route('specialist-salons') }}" data-url-name="{{ route('specialist-salon-name') }}">
                    <option value="0">Salon list</option>
                    @foreach ($beautySalons as $beautySalon)
                        <option value="{{ $beautySalon->id }}">{{ $beautySalon->salon_name }}</option>
                    @endforeach
                </select>
                <div class="form-text">Please select product category here</div>
            </div> --}}
            <div class="mb-3">
                <label class="form-label">Salons list</label>
                <select class="form-select" name="beauty_salon_id" >
                    <option value="0">Select the salon</option>
                    @foreach ($beautySalons as $beautySalon)
                        <option value="{{ $beautySalon->id }}">{{ $beautySalon->salon_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Service list</label>
                <select class="form-select" name="service_id">
                    <option value="0">Select the service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->service_title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Yes, edit it</button>
            @csrf
            @method('put')
        </form>
    </div>
@endsection
