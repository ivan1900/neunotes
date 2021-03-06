<?php namespace App\Models;

use CodeIgniter\Model;

class UserLoginModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user';
    protected $allowedFields = [
        'user', 'name', 'password'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}