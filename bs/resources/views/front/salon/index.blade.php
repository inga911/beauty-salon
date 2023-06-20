@extends('layouts.app')

@section('content')
    <h1>index - list of salons</h1>

    <form action="{{ route('salon-index') }}" method="GET">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="form-label">Sort</label>
                        <select class="form-select" name="sort">
                            <option value="0">Please select your sort preferences</option>
                            @foreach ($sortSelect as $value => $text)
                                <option value="{{ $value }}" @if ($value === $sort) selected @endif>
                                    {{ $text }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- <div class="col-4">
                  <div class="mb-3">
                      <label for="form-label">Filter</label>
                      <select class="form-select" name="filter">
                          <option value="0">Please select your filter preferences</option>
                          @foreach ($filterSelect as $value => $text)
                              <option value="{{ $value }}" @if ($value === $filter) selected @endif>{{ $text }}</option>
                          @endforeach
                        </select>
                    </div>
                    
                  </div> --}}
                  <div class="col-4">
                    <div class="mb-3">
                        <label for="form-label">Filter</label>
                        <select class="form-select" name="filter">
                            <option value="0">Please select your filter preferences</option>
                            <option value="all" @if ($filter === 'all') selected @endif>All Salons</option>
                            <option value="have_spec" @if ($filter === 'have_spec') selected @endif>Have Specialists</option>
                            <option value="dont_have_spec" @if ($filter === 'dont_have_spec') selected @endif>Don't Have Specialists</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('salon-index') }}" class="btn btn-info">Clear</a>
                </div>
            </div>
        </div>
    </form>

    @foreach ($beautySalons as $bs)
        <div class="card mb-3 salon-card">
            <div class="row g-0">
                <div class="col-md-4">

                    @if ($bs->photo)
                        <img src="{{ asset('img') . '/' . $bs->photo }}" class="salon-img" alt="Photo if salon">
                    @else
                        <img src="{{ asset('img') . '/gallery-icon.png' }}" class="img-fluid rounded-start"
                            alt="No image yet">
                    @endif

                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="salon-spec">
                            <h3>Specialists:</h3>
                            <ul>
                                @foreach ($bs->specialists as $specialist)
                                    <li><a href="{{ route('specialist-show', $specialist) }}">{{ $specialist->name }}
                                            {{ $specialist->surname }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="salon-info">
                            <h5 class="card-title">{{ $bs->salon_name }}</h5>
                            <p class="card-text">Address: {{ $bs->address }}</p>
                            <p class="card-text">City: {{ $bs->city }}</p>
                            <p class="card-text"><small class="text-muted">phone {{ $bs->phone_number }}</small></p>
                        </div>

                    </div>
                    <div class="buttons">
                        <a href="{{ route('salon-show', $bs) }}" class="btn">Show</a>
                        <a href="{{ route('salon-edit', $bs) }}" class="btn">Edit</a>
                        <form action="{{ route('salon-delete', $bs) }}" method="post">
                            <input type="hidden" name="beauty_salon_id" value="{{ $bs->id }}">
                            <button type="submit" class="btn btn-del">Delete</button>
                            @csrf
                            @method('delete')
                        </form>
                        <p style="font-size: 8px">rodyti tik admin</p>
                    </div>
                </div>
            </div>

        </div>
    @endforeach
    
@endsection
