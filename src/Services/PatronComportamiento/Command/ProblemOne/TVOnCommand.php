<?php

namespace App\Services\PatronComportamiento\Command\ProblemOne;

class TVOnCommand implements Command
{
    private TV $tv;

    public function __construct(TV $tv)
    {
        $this->tv = $tv;
    }

    public function execute(): string
    {
        return $this->tv->on();
    }

    public function undo(): string
    {
        return $this->tv->off();
    }
}
