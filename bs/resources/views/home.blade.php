@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <h3>Choose salon</h3>
                  <select class="form-select" name="beauty_salon_id" >
                    <option value="0">Select the salon</option>
                    @foreach ($beautySalons as $beautySalon)
                        <option value="{{ $beautySalon->id }}">{{ $beautySalon->salon_name }}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
