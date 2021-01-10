<?php

namespace App\Src\shared\infrastructure\codeigniter;

use App\Models\CIModel;
use App\Models;

abstract class CIRepository
{
    public $db;

    public function __construct()
    {        
        $this->db = new CIModel();
    }

}
