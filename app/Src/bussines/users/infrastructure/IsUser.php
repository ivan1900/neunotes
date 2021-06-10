<?php namespace App\Src\bussines\users\infrastructure;

use App\Src\bussines\users\domain\IUserSpecification;
class IsUser implements IUserSpecification
{
    private $user;
    
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function isSatisfied(): string
    {
        $sql = ("SELECT id, uuid, name, user, position, address, phone, email, active, language, created_at, timezone FROM users WHERE user='". $this->user ."'");
        return $sql;
    }
}

?>