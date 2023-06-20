@extends('layouts.app')

@section('content')
    <h1>show - specialist</h1>
    <div class="form">

        <div class="info">
            <h4 class="form-label">Name: {{ $specialist->name }}</h4>

            <h4 class="form-label">Surname: {{ $specialist->surname }}</h4>

            <h5 class="form-label">Works in:
                {{ $specialist->salon ? $specialist->salon->salon_name : 'Not assigned' }}</h5>


            <h5 class="form-label">Works with:
                {{ $specialist->service ? $specialist->service->service_title : 'Not assigned' }}</h5>


            @if ($specialist->rate)
                <form action="{{ route('specialist-vote', $specialist) }}" method="post">
                    @include('front.specialist.vote', ['specialist' => $specialist])
                    <button type="submit" class="btn btn-info">Vote</button>
                    @csrf
                    @method('put')
                </form>
            @else
                <form action="{{ route('specialist-vote', $specialist) }}" method="post">
                    @include('front.specialist.vote', ['specialist' => $specialist])
                    <button type="submit" class="btn btn-info">Vote</button>
                    @csrf
                    @method('put')
                </form>
            @endif
        </div>
        <div class="img">
            <img class="profile-img" src="{{ asset('img') . '/' . $specialist->photo }}" alt="Profile picture">
        </div>
    </div>
@endsection
