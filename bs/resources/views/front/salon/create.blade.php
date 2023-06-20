@extends('layouts.app')

@section('content')
    <h1>create - add new salon</h1>
    <div class="form">

        <form action="{{ route('salon-store') }}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Salon name</label>
                <input type="text" class="form-control" name="salon_name">
            </div>
            <div class="mb-3">
                <label class="form-label">Salon Address</label>
                <input type="text" class="form-control" name="address">
            </div>
            <div class="mb-3">
                <label class="form-label">Salon city</label>
                <input type="text" class="form-control" name="city">
            </div>
            <div class="mb-3">
                <label class="form-label">Salon phone number</label>
                <input type="text" class="form-control" name="phone_number">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
            @csrf
        </form>
    </div>
@endsection
