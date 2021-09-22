<?php namespace App\Src\bussines\users\application;

use App\Src\bussines\users\application\RequestDeleteUser;
use App\Src\bussines\users\infrastructure\UserRepositoryMySql;
use App\Src\shared\infrastructure\EventDispatcher;
use App\Src\shared\domain\aggregate\AggregateRoot;
use App\Src\bussines\users\domain\UserWasDeleted;
use Exception;

class DeleteUser extends AggregateRoot
{
    private $dispatcher;

    public function __construct()
    {   
        $this->dispatcher = new EventDispatcher;
    }

    public function exec(RequestDeleteUser $request)
    {
        $id = $request->id();

        $repository = new UserRepositoryMySql();
        try{
            $repository->delete($id);
            $userWasDeleted[] = new UserWasDeleted($id); 
            $this->dispatcher->notify($userWasDeleted);

        }catch (\Exception $e)
        {
            throw new \Exception($e);
        }

       /* $this->record(new UserWasDeleted($id));
        $events = $this->pullDomainEvents();
        $this->dispatcher->notify($events); */
    }

}