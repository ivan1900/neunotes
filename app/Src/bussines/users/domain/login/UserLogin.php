<?php namespace App\Src\bussines\users\domain\login;

use App\Src\shared\domain\aggregate\AggregateRoot;
use App\Src\bussines\users\domain\login\LoginWasOccurred;
use App\Src\bussines\users\domain\userName;
use App\Src\bussines\users\domain\userPassword;
use App\Src\bussines\users\domain\userUuid;

final class UserLogin extends AggregateRoot
{
    private $userName;
    private $password;
    private $uuid;
    
    public function __construct(UserName $userName,  UserPassword $password, ?UserUuid $uuid)
    {
        $this->userName = $userName;
        $this->password = $password;
        $this->uuid = $uuid;
    }

    public static function fromValues(UserName $userName, UserPassword $password, ?UserUuid $uuid):self
    {
        return new self($userName, $password, $uuid);
    }

    public static function encodeSha256FromValues(UserName $userName, UserPassword $password):self
    {
        return new self($userName, $password->encodeSHA256($password->value()),null);
    }

    public function userName()
    {
        return $this->userName;
    }

    public function password()
    {
        return $this->password;
    }

    public function uuid()
    {
        return $this->uuid;
    }

    public function equalsTo(UserLogin $anUserLogin)
    {
        $isLogged = $anUserLogin->userName()->equals($this->UserName()) &&
                    $anUserLogin->password()->equals($this->password());
        
        $this->record(new LoginWasOccurred(
            $anUserLogin->userName()->value(),
            $isLogged,
            $anUserLogin->uuid()->value()
        ));

        return $isLogged;
    }

}
