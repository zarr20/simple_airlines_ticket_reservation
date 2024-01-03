<?php

namespace App\Models;

use CodeIgniter\Model;

class PassengersModel extends Model
{
    protected $table = 'passengers';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['flight_id', 'name', 'birth_date', 'address'];
}
