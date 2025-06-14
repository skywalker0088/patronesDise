<?php

namespace App\Services\PatronComportamiento\Command\ProblemOne;

class LightOnCommand implements Command
{
    private Light $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): string
    {
        return $this->light->on();
    }

    public function undo(): string
    {
        return $this->light->off();
    }
}
