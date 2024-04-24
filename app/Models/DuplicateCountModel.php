<?php

namespace App\Models;

use CodeIgniter\Model;

class DuplicateCountModel extends Model
{
    protected $table = 'duplicate_count';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'count'];
}

