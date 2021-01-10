<?php namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
    protected $table = 'configuracion';
    protected $primaryKey = 'propiedad';
    protected $allowedFields = [
        'propiedad', 'valor'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
}