<?php

namespace App\Services\PatronComportamiento\Mediator\ProblemOne;

class ChatRoom implements ChatMediator
{
    private array $usuarios = [];

    public function addUser(Usuario $usuario): void
    {
        $this->usuarios[] = $usuario;
    }

    public function send(string $message, Usuario $sender): array
    {
        $return = [];
        $return[] = "[{$sender->getNombre()}] dice: $message\n";
        foreach ($this->usuarios as $usuario) {
            if ($usuario !== $sender) {
               $return[] = $usuario->receive($message);
            }
        }

        return $return;
    }
}
