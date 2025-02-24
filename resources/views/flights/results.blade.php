@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Résultats de recherche</h2>

    @if(isset($flights['error']))
        <div class="alert alert-danger">{{ $flights['error'] }}</div>
    @elseif(empty($flights))
        <div class="alert alert-warning">Aucun vol trouvé.</div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Compagnie</th>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights['data'] as $flight)
                    <tr>
                        <td>{{ $flight['validatingAirlineCodes'][0] ?? 'N/A' }}</td>
                        <td>{{ $flight['itineraries'][0]['segments'][0]['departure']['iataCode'] }}</td>
                        <td>{{ $flight['itineraries'][0]['segments'][0]['arrival']['iataCode'] }}</td>
                        <td>{{ $flight['price']['total'] }} {{ $flight['price']['currency'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
