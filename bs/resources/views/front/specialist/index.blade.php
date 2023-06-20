@extends('layouts.app')

@section('content')
    <h1>index - list of specialists</h1>

    
    <div class="specialist-card">
        @foreach ($specialists as $spec)
            <div class="card">
                <div class="row g-0">
                    <div class="profile-img" >
                        @if ($spec->photo)
                            <img src="{{ asset('img') . '/' . $spec->photo }}" class="img-fluid rounded-start" alt="No image yet">
                        @else
                            <img src="{{ asset('img') . '/gallery-icon.png' }}" class="img-fluid rounded-start" alt="No image yet">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $spec->name }}</h5>
                            <p class="card-text">{{ $spec->surname }}</p>
                            <div>Salon: {{ optional($spec->salon)->salon_name }}</div>
                            {{-- <div>Service:
                                @if ($spec->services->isNotEmpty())
                                    @foreach ($spec->services as $service)
                                        <a href="{{ route('service-show', $service) }}">{{ $service->service_title }}</a>
                                    @endforeach
                                @else
                                    Not assigned
                                @endif
                            </div> --}}
                        </div>
                    </div>
                </div>
                @include('front.specialist.vote', ['specialist' => $spec])
                <a href="{{ route('specialist-show', $spec) }}">Show</a>
                <a href="{{ route('specialist-edit', $spec) }}">Edit</a>
                <form action="{{ route('specialist-delete', $spec) }}" method="post">
                    <input type="hidden" name="specialist_id" value="{{ $spec->id }}">
                    <button type="submit" class="btn btn-del">Delete</button>
                    @csrf
                    @method('delete')
                </form>
            </div>
        @endforeach
    </div>
@endsection