<?php

namespace App\Services;

use Amadeus\Amadeus;
use Exception;

class AmadeusService
{
    protected $amadeus;

    public function __construct()
    {
        $this->amadeus = Amadeus::builder(env('AMADEUS_API_KEY'), env('AMADEUS_API_SECRET'))
            ->setEnvironment(env('AMADEUS_ENVIRONMENT') === 'production' ? Amadeus::ENV_PRODUCTION : Amadeus::ENV_TEST)
            ->build();
    }

    /**
     * Recherche de vols selon l'origine, la destination et la date.
     */
    public function searchFlights($origin, $destination, $departureDate)
    {
        try {
            $response = $this->amadeus->getShopping()->getFlightOffers()->get([
                'originLocationCode' => $origin,
                'destinationLocationCode' => $destination,
                'departureDate' => $departureDate,
                'adults' => 1,
                'max' => 10
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
 
