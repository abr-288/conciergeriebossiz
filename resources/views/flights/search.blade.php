@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Rechercher un vol</h2>
    <form method="POST" action="{{ route('flights.search') }}">
        @csrf
        <div class="mb-3">
            <label for="origin" class="form-label">Code Aéroport de départ (ex: CDG)</label>
            <input type="text" name="origin" id="origin" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Code Aéroport de destination (ex: JFK)</label>
            <input type="text" name="destination" id="destination" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="departureDate" class="form-label">Date de départ</label>
            <input type="date" name="departureDate" id="departureDate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
</div>
@endsection
