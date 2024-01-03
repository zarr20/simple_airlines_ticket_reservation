<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingsModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['flight_id', 'passengers'];
}
