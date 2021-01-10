<?php
declare(strict_types = 1);

namespace App\Src\bussines\menu\domain;

use App\Src\shared\domain\Collection;

final class Menus extends Collection
{
    protected function type(): string 
    {
        return Menu::class;
    }
}