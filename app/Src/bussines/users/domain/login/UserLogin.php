<?php namespace App\Src\bussines\users\domain\login;

use App\Src\shared\domain\aggregate\AggregateRoot;
use App\Src\bussines\users\domain\login\LoginWasOccurred;
use App\Src\bussines\users\domain\userName;
use App\Src\bussines\users\domain\userPassword;

final class UserLogin extends AggregateRoot
{
    private $userName;
    private $password;
    
    public function __construct(UserName $userName,  UserPassword $password)
    {
        $this->userName = $userName;
        $this->password = $password;
    }

    public static function fromValues(UserName $userName, UserPassword $password):self
    {
        return new self($userName, $password);
    }

    public static function encodeSha256FromValues(UserName $userName, UserPassword $password):self
    {
        return new self($userName, $password->encodeSHA256($password->value()));
    }

    public function userName()
    {
        return $this->userName;
    }

    public function password()
    {
        return $this->password;
    }

    public function equalsTo(UserLogin $anUserLogin)
    {
        $isLogged = $anUserLogin->userName()->equals($this->UserName()) &&
                    $anUserLogin->password()->equals($this->password());
        
        $this->record(new LoginWasOccurred(
            $this->userName->value(),
            $isLogged
        ));

        return $isLogged;
    }

}
