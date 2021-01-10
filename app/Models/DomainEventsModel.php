<?php namespace App\Models;

use CodeIgniter\Model;

class DomainEventsModel extends Model
{
    protected $table = 'domain_events';
    protected $primaryKey = 'id';
    // protected $allowedFields = [
    //     'serialized', 'occurredOn'
    // ];
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $useSoftDeletes = false;
}