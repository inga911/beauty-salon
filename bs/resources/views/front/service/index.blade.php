@extends('layouts.app')

@section('content')
    <h1>index - list of services</h1>

    @foreach ($service as $s)
        <div class="card mb-3 service-card">
            <div class="row g-0" style="background-color:bisque">

                <div class="col-md-8" style="background-color:rgb(185, 229, 54)">
                    <div class="service-title" style="background-color:rgb(196, 255, 219)">
                        <h5 class="card-title">Service: {{ $s->service_title }}</h5>
                    </div>
                    <div class="specialists">
                        <h3>Specialists:</h3>
                        <ul>
                            @foreach ($s->specialists as $specialist)
                                <li>
                                    <a href="{{ route('specialist-show', $specialist) }}">{{ $specialist->name }}
                                        {{ $specialist->surname }}</a>
                                    @if ($specialist->rate)
                                        @include('front.specialist.vote', ['specialist' => $specialist])
                                    @else
                                        <p>don't have votes yet</p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="description">
                <p>About service:</p>
                {{ $s->service_description }}
            </div>

            <div class="details">
                <p class="card-text">Duration (min): {{ $s->duration }}</p>
                <p class="card-text">Price: {{ $s->price }}</p>
            </div>
            <button class="cart">Add to cart</button>

            <div class="buttons">
                <a href="{{ route('service-show', $s) }}" class="btn">Show</a>
                <a href="{{ route('service-edit', $s) }}" class="btn">Edit</a>
                <form action="{{ route('service-delete', $s) }}" method="post">
                    {{-- <input type="hidden" name="service_id" value="{{ $service->id }}"> --}}
                    <button type="submit" class="btn btn-del">Delete</button>
                    @csrf
                    @method('delete')
                </form>
                <p style="font-size: 8px">rodyti tik admin</p>
            </div>
        </div>
    @endforeach
@endsection
