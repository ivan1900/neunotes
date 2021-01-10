<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Success extends BaseController
{
    public function index(){
        echo view('success');
    }
}