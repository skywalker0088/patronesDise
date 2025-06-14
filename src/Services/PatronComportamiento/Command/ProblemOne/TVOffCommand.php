<?php

namespace App\Services\PatronComportamiento\Command\ProblemOne;

class TVOffCommand implements Command
{
    private TV $tv;

    public function __construct(TV $tv)
    {
        $this->tv = $tv;
    }

    public function execute(): string
    {
        return $this->tv->off();
    }

    public function undo(): string
    {
        return $this->tv->on();
    }
}
