<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
    protected $table = 'crud';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description'];
}
