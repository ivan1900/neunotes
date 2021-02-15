<?php

namespace App\Src\bussines\users\domain;

use App\Src\bussines\users\domain\UserUuid;
use App\Src\bussines\users\domain\UserName;
use App\Src\bussines\users\domain\UserNickName;
use App\Src\bussines\users\domain\UserPassword;
use App\Src\bussines\users\domain\UserPhone;
use App\Src\bussines\users\domain\UserAddress;
use App\Src\bussines\users\domain\UserEmail;
use App\Src\bussines\users\domain\UserPosition;

use App\Src\shared\domain\aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    public function __construct(
        UserUuid $uuid,
        UserName $name,
        UserNickName $user,
        UserPassword $password,
        UserPhone $phone,
        UserEmail $email,
        UserAddress $address,
        UserPosition $position)
    {}

    public static function fromValues(object $values):self
    {
        return new self($values->uuid, $values->name, $values->user, $values->password, $values->phone, $values->email, $values->address, $values->position);
    }

    public function uuid()
    {
        return $this->uuid;
    }

    public function name()
    {
        return $this->name;
    }

    public function password()
    {
        return $this->password;
    }

    public function phone()
    {
        return $this->phone;
    }

    public function email()
    {
        return $this->email;
    }

    public function address()
    {
        return $this->address;
    }

    public function position()
    {
        return $this->position;
    }
}
