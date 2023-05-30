@extends('layouts.app')

@section('content')

<h1>index - list of specialists</h1>

@foreach ($specialists as $spec)
<div class="card mb-3" style="max-width: 740px; margin-left: 5%">
    <div class="row g-0">
      <div class="col-md-4">

        @if ($spec->photo)
        <img src="{{ asset('img').'/'.$spec->photo }}" class="img-fluid rounded-start" alt="No image yet">
    @else
        <img src="{{ asset('img').'/gallery-icon.png'}}" class="img-fluid rounded-start" alt="No image yet">
    @endif
    
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Specialist name : {{$spec->name}}</h5>
          <p class="card-text">Specialist surname : {{$spec->surname}}</p>
        </div>
      </div>
    </div>
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



@endsection