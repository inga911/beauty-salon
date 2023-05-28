@extends('layouts.app')

@section('content')

<h1>index - salonu sarasas</h1>

@foreach ($beautySalons as $bs)
<div class="card mb-3" style="max-width: 740px; margin-left: 5%">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="" class="img-fluid rounded-start" alt="No image yet">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{$bs->salon_name}}</h5>
          <p class="card-text">Address: {{$bs->address}}</p>
          <p class="card-text"><small class="text-muted">phone {{$bs->phone_number}}</small></p>
        </div>
      </div>
    </div>
    <a href="{{ route('back-show', $bs) }}">Show</a>
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