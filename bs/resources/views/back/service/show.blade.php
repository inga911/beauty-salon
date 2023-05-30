@extends('layouts.app')

@section('content')


    <h1>show - service</h1>
    <div class="form" style="border: 1px solid black; width:50%">

            <div class="mb-3">
                <label class="form-label">Service name: {{ $service->service_title }}</label>
            </div>
            <div class="mb-3">
                <label class="form-label">Service duration: {{ $service->duration }}</label>
            </div>
            <div class="mb-3">
                <label class="form-label">Service price: {{ $service->price }}</label>
            </div>


    </div>
@endsection
