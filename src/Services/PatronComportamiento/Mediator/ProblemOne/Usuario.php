<?php

namespace App\Services\PatronComportamiento\Mediator\ProblemOne;

class Usuario
{
    public function __construct(
        private string $nombre,
        private ChatMediator $mediator
    ) {
        $this->mediator->addUser($this);
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function send(string $message): array
    {
        return $this->mediator->send($message, $this);
    }

    public function receive(string $message): void
    {
        echo "> {$this->nombre} recibió: $message\n";
    }
}
