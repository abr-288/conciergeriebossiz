<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AmadeusService;

class FlightController extends Controller
{
    protected $amadeusService;

    public function __construct(AmadeusService $amadeusService)
    {
        $this->amadeusService = $amadeusService;
    }

    public function searchFlights(Request $request)
    {
        $request->validate([
            'origin' => 'required|string|size:3',
            'destination' => 'required|string|size:3',
            'departureDate' => 'required|date',
        ]);

        $flights = $this->amadeusService->searchFlights(
            strtoupper($request->origin),
            strtoupper($request->destination),
            $request->departureDate
        );

        return view('flights.results', compact('flights'));
    }
}
