<?php
declare(strict_types = 1);

namespace App\Src\bussines\groups\domain;

use App\Src\shared\domain\Collection;

final class TypeGroups extends Collection
{
    protected function type(): string 
    {
        return TypeGroup::class;
    }
}