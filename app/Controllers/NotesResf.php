<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Src\bussines\notes\application\CreateNote;
use App\Src\bussines\notes\application\RequestCreateNote;

class NotesResf extends ResourceController
{
    protected $format = 'json';

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'OPTIONS') {
            $requestCreateNote = new RequestCreateNote(
                title: $_POST['title'],
                content: $_POST['content']
            );
            $createNote = new CreateNote();

            try
            {
                $createNote->create($requestCreateNote);  
                $this->response->setStatusCode(201);      
            }catch(\Exception){
                $this->response->setStatusCode(400);
            }
        }
    }

    
}