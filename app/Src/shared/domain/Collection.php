<?php
namespace App\Src\shared\domain;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use App\Src\shared\domain\Assert;

abstract class Collection implements Countable, IteratorAggregate
{
    public function __construct(array $items)
    {
        Assert::arrayOf($this->type(), $items);
    }

    abstract protected function type(): string;

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items());
    }

    public function count(): int
    {
        return count($this->items());
    }

    protected function items(): array
    {
        return $this->items;
    }

}