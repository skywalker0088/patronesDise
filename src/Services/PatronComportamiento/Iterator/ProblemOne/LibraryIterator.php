<?php

namespace App\Services\PatronComportamiento\Iterator\ProblemOne;

use Iterator;

class LibraryIterator implements Iterator
{
    private int $position = 0;

    public function __construct(private array $books) {}

    public function current(): Book
    {
        return $this->books[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        $this->position++;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->books[$this->position]);
    }
}
