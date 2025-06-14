<?php

namespace App\Services\PatronComportamiento\Command\ProblemOne;

class TV
{
    private string $location;

    public function __construct(string $location)
    {
        $this->location = $location;
    }

    public function on(): string
    {
        return "La TV en {$this->location} está encendida.\n";
    }

    public function off(): string
    {
        return "La TV en {$this->location} está apagada.\n";
    }
}
