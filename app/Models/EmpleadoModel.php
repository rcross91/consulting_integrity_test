<?php 

namespace App\Models;

use CodeIgniter\Model;

class EmpleadoModel extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['name','email','birth_date','area_id'];
}