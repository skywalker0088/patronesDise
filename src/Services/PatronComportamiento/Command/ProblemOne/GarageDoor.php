<?php

namespace App\Services\PatronComportamiento\Command\ProblemOne;

class GarageDoor
{
    public function open(): string
    {
        return "La puerta del garage está abierta.\n";
    }

    public function close(): string
    {
        return "La puerta del garage está cerrada.\n";
    }
}
