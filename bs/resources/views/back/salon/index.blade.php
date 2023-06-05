@extends('layouts.app')

@section('content')

<h1>index - list of salons</h1>

@foreach ($beautySalons as $bs)
<div class="card mb-3" style="max-width: 740px; margin-left: 5%">
    <div class="row g-0">
      <div class="col-md-4">

        @if ($bs->photo)
        <img src="{{ asset('img').'/'.$bs->photo }}" class="img-fluid rounded-start" alt="No image yet">
    @else
        <img src="{{ asset('img').'/gallery-icon.png'}}" class="img-fluid rounded-start" alt="No image yet">
    @endif

      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{$bs->salon_name}}</h5>
          <p class="card-text">Address: {{$bs->address}}</p>
          <p class="card-text">City: {{$bs->city}}</p>
          <p class="card-text"><small class="text-muted">phone {{$bs->phone_number}}</small></p>
        </div>
      </div>
      <h3>Specialists:</h3>
        <ul>
            @foreach ($bs->specialists as $specialist)
                <li><a href="{{route('specialist-show', $specialist)}}">{{$specialist->name}} {{$specialist->surname}}</a></li>
            @endforeach
        </ul>
    </div>
    <a href="{{ route('salon-show', $bs) }}">Show</a>
    <a href="{{ route('salon-edit', $bs) }}">Edit</a>
    <form action="{{ route('salon-delete', $bs) }}" method="post">                                         
        <input type="hidden" name="beauty_salon_id" value="{{ $bs->id }}">
        <button type="submit" class="btn btn-del">Delete</button>
        @csrf
        @method('delete')
    </form>   
</div>
@endforeach



@endsection