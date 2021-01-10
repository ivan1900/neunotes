<?php namespace App\Src\bussines\users\application;

use App\Src\bussines\users\application\GetUsersList;
use App\Src\bussines\users\application\GetUsersInGroup;
class GetUsersAvailable
{
    private $groupId;
    private $usersList;
    private $usersInGroup;

    public function __invoke($groupId)
    {
        $this->groupId = $groupId;

        $getUsersList = new GetUsersList();
        $this->usersList = $getUsersList();

        $getUsersInGroup = new GetUsersInGroup();
        $this->usersInGroup = $getUsersInGroup($groupId);

        $this->usersAvailables();

        return $this->usersList;
        
    }

    private function usersAvailables()
    {
        foreach ($this->usersInGroup as $userInGroup)
        {
            foreach ($this->usersList as $key => $user)
            {
                if($userInGroup->idusuario == $user->idusuario )
                {
                    unset($this->usersList[$key]);
                    break;
                }
            }
        }
    }
   
}