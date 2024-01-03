<?php

namespace App\Controllers;

use App\Models\BookingsModel;
use App\Models\PassengersModel;

class BookingController extends BaseController
{
    protected $passengerModel;
    protected $bookingModel;

    function __construct()
    {
        helper('form');
        $this->passengerModel = new PassengersModel();
        $this->bookingModel = new BookingsModel();
    }
    public function index($flightId)
    {
        $data = [
            'title' => 'Booking Airlines',
            'flightId' => $flightId,
        ];
        return view('main/bookingTicket/inputPassenger', $data);
    }
    public function process_data()
    {
        $validation = \Config\Services::validation();

        // $rules = [
        //     'flight_id' => 'required|numeric',
        //     'passenger_name.*' => 'required',
        //     'birth_date.*' => 'required|valid_date',
        //     'address.*' => 'required',
        // ];

        // if (!$this->validate($rules)) {
        //     return redirect()->back()->withInput()->with('validation', $validation);
        // }

        $flightId = $this->request->getPost('flight_id');
        $passengerNames = $this->request->getPost('passenger_name');
        $birthDates = $this->request->getPost('birth_date');
        $addresses = $this->request->getPost('address');


        $passenger_ids = []; // 1,2,3,4,5

        foreach ($passengerNames as $key => $passengerName) {
            $passengerData = [
                'flight_id' => $flightId,
                'name' => $passengerName,
                'birth_date' => $birthDates[$key],
                'address' => $addresses[$key],
            ];
            $this->passengerModel->insert($passengerData);

            $passenger_ids[] = $this->passengerModel->getInsertID();
        }

        $passenger_ids = implode(',', $passenger_ids);

        $bookingData = [
            'flight_id' => $flightId,
            'passengers' => $passenger_ids
        ];

        $this->bookingModel->insert($bookingData);

        $bookingId = $this->bookingModel->getInsertID();

        // var_dump($passenger_ids);
        // exit;

        return redirect()->to("booking/details/$bookingId")->with('success', 'Passengers added successfully.');
    }

    public function details($bookingId){
        $data = [
            'title' => 'Booking Details',
            'bookingId' => $bookingId
        ];
        return view('main/bookingTicket/bookingDetails', $data);
    }

    public function delete($bookingId)
    {
        $booking = $this->bookingModel->find($bookingId);

        if (!$booking) {
            return redirect()->to('/')->with('error', 'Booking not found.');
        }
        
        $this->bookingModel->delete($bookingId);

        return redirect()->to('/')->with('success', 'Booking deleted successfully.');
    }
}
