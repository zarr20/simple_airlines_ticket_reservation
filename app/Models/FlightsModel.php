<?php

namespace App\Models;

use CodeIgniter\Model;

class FlightsModel extends Model
{
    protected $table      = 'airline_flights';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['flight_number', 'departure', 'arrival', 'status', 'departure_time', 'arrival_time'];

    public function getUniqueDepartures()
    {
        $query = "SELECT DISTINCT departure FROM airline_flights";
        return $this->db->query($query)->getResult();
    }

    public function getUniqueArrivals()
    {
        $query = "SELECT DISTINCT arrival FROM airline_flights";
        return $this->db->query($query)->getResult();
    }

    public function getFlightsByStatusRaw($status = null)
    {
        $query = "SELECT * FROM airline_flights";

        if ($status !== null) {
            $query .= " WHERE status = ?";
            return $this->db->query($query, [$status])->getResult();
        }

        return $this->db->query($query)->getResult();
    }

    public function getFlightsByDepartureArrivalTime($departure, $arrival, $departure_time)
    {
        $departure_time_formatted = date('Y-m-d H:i:s', strtotime($departure_time));
        $query = "SELECT * FROM airline_flights WHERE departure = ? AND arrival = ? AND departure_time > ?";

        return $this->db->query($query, [$departure, $arrival, $departure_time_formatted])->getResult();
    }
}
