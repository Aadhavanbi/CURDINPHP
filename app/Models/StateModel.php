<?php

namespace App\Models;

use CodeIgniter\Model;

class StateModel extends Model
{
    protected $table = 'states';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'countryId'];

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
