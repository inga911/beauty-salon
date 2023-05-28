@extends('layouts.app')

@section('content')

<h1>index - paslaugu sarasas</h1>

@foreach ($service as $s)
<div class="card mb-3" style="max-width: 740px; margin-left: 5%">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="" class="img-fluid rounded-start" alt="No image yet">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Service: {{$s->service_title}}</h5>
          <p class="card-text">Duration (min): {{$s->duration}}</p>
          <p class="card-text">Price: {{$s->price}}</p>
        </div>
      </div>
    </div>
    <a href="{{ route('service-show', $s) }}">Show</a>
    <a href="{{ route('service-edit', $s) }}">Edit</a>
    <form action="{{ route('service-delete', $s) }}" method="post">                                         
        {{-- <input type="hidden" name="service_id" value="{{ $service->id }}"> --}}
        <button type="submit" class="btn btn-del">Delete</button>
        @csrf
        @method('delete')
    </form>   
</div>
@endforeach



@endsection