<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'FlightController::index');
$routes->get('flight', 'FlightController::searchFlights');

// $routes->get('booking', 'BookingController::index');
$routes->group('booking', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('(:segment)', 'BookingController::index/$1');
    $routes->get('details/(:segment)', 'BookingController::details/$1');
    $routes->get('(:segment)/delete', 'BookingController::delete/$1');
    $routes->post('process_data', 'BookingController::process_data');
});

