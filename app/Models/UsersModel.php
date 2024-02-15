<?php 
namespace App\Models;
use CodeIgniter\Model;
class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','userName','age','country','state','city', 'image'];

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

