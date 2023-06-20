@extends('layouts.app')

@section('content')
    <h1>BACK</h1>
    @foreach ($beautySalons as $bs)
        <div class="card mb-3" style="max-width: 90vw; margin-left: 5%">
            <div class="row g-0">
                <div class="col-md-4">

                    @if ($bs->photo)
                        <img src="{{ asset('img') . '/' . $bs->photo }}" class="img-fluid rounded-start" alt="No image yet">
                    @else
                        <img src="{{ asset('img') . '/gallery-icon.png' }}" class="img-fluid rounded-start" alt="No image yet">
                    @endif

                </div>
                <div class="col-md-8" style="width:25rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $bs->salon_name }}</h5>
                        <p class="card-text">Address: {{ $bs->address }}</p>
                        <p class="card-text">City: {{ $bs->city }}</p>
                        <p class="card-text"><small class="text-muted">phone {{ $bs->phone_number }}</small></p>
                    </div>
                </div>
                <div style="float:right; width:25%; margin-left: 30px;">
                <h3>Specialists:</h3>
                    <ul class="list-group list-group-flush">
                        @foreach ($bs->specialists as $specialist)
                      <li class="list-group-item">{{ $specialist->name }} {{ $specialist->surname }}
                        @include('back.vote', ['specialist' => $specialist])
                    </li>
                        @endforeach
                    </ul>
                  </div>
                <ul>
                </ul>
                <div >
                <h5 style="margin-left: 45px">Services:</h5>
                <ul>
                    @foreach ($services as $service)
                    <div class="card" style="width: 15rem; margin-bottom: 10px; margin-left: 15px; display: inline-block">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Service: <b>{{$service->service_title}}</b></li>
                          <li class="list-group-item">Duration (min): {{$service->duration}}</li>
                          <li class="list-group-item">Price: {{$service->price}}</li>
                        </ul>
                    </div>
                    @endforeach
                </ul>
            </div>
            </div>
            <a href="{{ route('back-edit', $bs) }}">Edit</a>
            <form action="{{ route('back-delete', $bs) }}" method="post">
                <input type="hidden" name="beauty_salon_id" value="{{ $bs->id }}">
                <button type="submit" class="btn btn-del">Delete</button>
                @csrf
                @method('delete')
            </form>
        </div>
    @endforeach
@endsection
