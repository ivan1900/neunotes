<?php namespace App\Src\bussines\users\infrastructure;

class IsUser
{
    public function isSatisfied($user)
    {
        $sql = ('SELECT * FROM users WHERE user='. $user);
        return $sql;
    }
}

?>