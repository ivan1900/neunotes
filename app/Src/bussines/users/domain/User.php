<?php

namespace App\Src\bussines\users\domain;

use App\Src\bussines\users\domain\login\UserCreated as LoginUserCreated;
use App\Src\bussines\users\domain\UserUuid;
use App\Src\bussines\users\domain\UserName;
use App\Src\bussines\users\domain\UserNickName;
use App\Src\bussines\users\domain\UserPassword;
use App\Src\bussines\users\domain\UserPhone;
use App\Src\bussines\users\domain\UserAddress;
use App\Src\bussines\users\domain\UserEmail;
use App\Src\bussines\users\domain\UserPosition;
use App\Src\bussines\users\domain\UserRole;
use App\Src\bussines\users\domain\UserLanguage;
use App\Src\bussines\users\domain\UserActive;
use App\Src\bussines\users\domain\UserTimezone;
use App\Src\shared\domain\aggregate\AggregateRoot;

use App\Src\bussines\users\domain\UserCreated;

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
        UserPosition $position,
        UserRole $role,
        UserLanguage $language,
        UserActive $active,
        UserTimezone $timezone)
    {}

    public static function fromValues(object $values):self
    {
        return new self(
            $values->uuid, 
            $values->name, 
            $values->user, 
            $values->password, 
            $values->phone, 
            $values->email, 
            $values->address, 
            $values->position,
            $values->role,
            $values->language,
            $values->active,
            $values->timezone
        );
    }

    public static function create(
        UserUuid $uuid,
        UserName $name,
        UserNickName $user,
        UserPassword $password,
        UserPhone $phone,
        UserEmail $email,
        UserAddress $address,
        UserPosition $position,
        UserRole $role,
        UserLanguage $language,
        UserActive $active,
        UserTimezone $timezone
    ):User
    {
        $user = new self($uuid, $name, $user, $password, $phone, $email, $address, $position, $role, $language, $active, $timezone);

        $user->record(new LoginUserCreated(
            $name->value(),
            $uuid->value()
        ));

        return $user;
    }

    public function uuid()
    {
        return $this->uuid;
    }

    public function name()
    {
        return $this->name;
    }

    public function user()
    {
        return $this->user;
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

    public function role()
    {
        return $this->role;
    }

    public function language()
    {
        return $this->language;
    }

    public function active()
    {
        return $this->active;
    }

    public function timezone()
    {
        return $this->active;
    }
}
