@extends('layouts.app')

@section('content')
    <h1>create - add new specialist</h1>
    <div class="form" style="border: 1px solid black; ">

        <form action="{{ route('specialist-store') }}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Specialist name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Specialist surname</label>
                <input type="text" class="form-control" name="surname">
            </div>
            <div>
                <label>Upload photo</label>
                <input type="file" class="form-control" name="photo">
            </div>
            {{-- <p> pasirinkimas is salonu</p> --}}
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
            <button type="submit" class="btn btn-primary">Save</button>
            @csrf
        </form>
    </div>
@endsection
