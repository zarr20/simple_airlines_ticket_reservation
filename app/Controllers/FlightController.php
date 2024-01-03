<?php

namespace App\Controllers;

use App\Models\FlightsModel;

class FlightController extends BaseController
{
    protected $airlineFlightsModel;
    function __construct()
    {
        helper('form');
        $this->airlineFlightsModel = new FlightsModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Main Page',
            'data' => [
                'departures' => $this->airlineFlightsModel->getUniqueDepartures(),
                'arrivals' => $this->airlineFlightsModel->getUniqueArrivals(),
            ]
        ];
        return view('main/home', $data);
    }
    public function searchFlights()
    {
        $departure = $this->request->getGet('departure');
        $arrival = $this->request->getGet('arrival');
        $departureTime = $this->request->getGet('departure_time');
        $flights = $this->airlineFlightsModel->getFlightsByDepartureArrivalTime($departure, $arrival, $departureTime);


        $data = [
            'title' => 'Search Airlines',
            'data' => [
                'airline_flights' => $flights,
            ],
        ];
        return view('main/searchFlight', $data);
    }
}
