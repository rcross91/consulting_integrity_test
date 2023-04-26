<?php 

namespace App\Models;

use CodeIgniter\Model;

class AreaModel extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['name','nro_empleados'];
}