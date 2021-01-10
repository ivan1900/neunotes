<?php namespace App\Models;

use CodeIgniter\Model;

class UserLoginModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'usuario';
    protected $allowedFields = [
        'usuario', 'name', 'pass'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}