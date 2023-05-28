@extends('layouts.app')

@section('content')
    <h1>edit </h1>
    <div class="form" style="border: 1px solid black; ">

        <form action="{{ route('service-update', $service) }}" method="post">
            <div class="mb-3">
                <label class="form-label">Service name</label>
                <input type="text" class="form-control" name="service_title" value="{{old('service_title', $service->service_title)}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Service duration</label>
                <input type="text" class="form-control" name="duration" value="{{old('duration', $service->duration)}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Service price</label>
                <input type="text" class="form-control" name="price" value="{{old('price', $service->price)}}">
            </div>
            <button type="submit" class="btn btn-primary">Yes, edit it</button>
            @csrf
            @method('put')
        </form>
    </div>
@endsection
