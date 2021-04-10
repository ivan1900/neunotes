<?php namespace  App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Src\bussines\users\application\GetUser;
use App\Src\bussines\users\application\RequestUser;

class ConfigResf extends ResourceController{

    protected $format = 'json';

    public function show($user = null)
    {
        $request = new RequestUser($user);
        $getUser = new GetUser($request);

        return $this->respond($getUser->execute());
    }
}