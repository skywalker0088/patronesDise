<?php

namespace App\Services\PatronComportamiento\Command\ProblemOne;

class Light
{
    private string $location;

    public function __construct(string $location)
    {
        $this->location = $location;
    }

    public function on(): string
    {
        return "La luz en {$this->location} está encendida.\n";
    }

    public function off(): string
    {
        return "La luz en {$this->location} está apagada.\n";
    }
}
