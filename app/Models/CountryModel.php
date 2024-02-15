<?php

namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'sortName', 'name', 'code'];

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
