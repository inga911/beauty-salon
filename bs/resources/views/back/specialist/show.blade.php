@extends('layouts.app')

@section('content')


    <h1>show - specialist</h1>
    <div class="form" style="border: 1px solid black; width:50%">

            <div class="mb-3">
                <label class="form-label">specialist name: {{ $specialist->name }}</label>
            </div>
            <div class="mb-3">
                <label class="form-label">specialist surname: {{ $specialist->surname }}</label>
            </div>
            <div class="mb-3">
                <label class="form-label">Assigned Salon: {{ $specialist->salon ? $specialist->salon->salon_name : 'Not assigned' }}</label>
             </div>
            <div class="mb-3">
                {{-- <label class="form-label">specialist profile picture: {{ $specialist->photo }}</label> --}}
                <img src="{{ asset('img').'/'.$specialist->photo }}" alt="Profile picture" style="width: 250px; height: 250px, object-fit: cover;">
            </div>


    </div>
@endsection
