@extends('layouts.app')

@section('content')
    <h1>create - add new service</h1>
    <div class="form" style="border: 1px solid black; ">

        <form action="{{ route('service-store') }}" method="post">
            <div class="mb-3">
                <label class="form-label">Service</label>
                <input type="text" class="form-control" name="service_title">
            </div>
            <div class="mb-3">
                <label class="form-label">Service duration</label>
                <input type="text" class="form-control" name="duration">
            </div>
            <div class="mb-3">
                <label class="form-label">Service price</label>
                <input type="text" class="form-control" name="price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @csrf
        </form>
    </div>
@endsection
