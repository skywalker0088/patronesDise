<?php

namespace App\Services\PatronComportamiento\Mediator\ProblemOne;

interface ChatMediator
{
    public function send(string $message, Usuario $sender): array;
    public function addUser(Usuario $usuario): void;
}
