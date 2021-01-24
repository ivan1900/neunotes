<?php
declare(strict_types = 1);

namespace App\Src\bussines\groups\domain;

use App\Src\shared\domain\Collection;
use App\Src\bussines\groups\domain\Group;

final class Groups extends Collection
{
    protected function type(): string 
    {
        return Group::class;
    }
}