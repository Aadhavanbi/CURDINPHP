<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'stateId'];

    public function saveData($data, $id = null)
    {
        if ($id === null) {
            // Insert new record
            return $this->insert($data);
        } else {
            // Update existing record
            return $this->update($id, $data);
        }
    }
}
