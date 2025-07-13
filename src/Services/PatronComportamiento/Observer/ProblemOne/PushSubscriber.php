<?php

namespace App\Services\PatronComportamiento\Observer\ProblemOne;

class PushSubscriber implements Subscriber
{
    private int $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function update(string $articleTitle): string
    {
        return "🔔 Enviando notificación push al usuario {$this->userId}: Nuevo artículo publicado: '$articleTitle'\n";
    }
}
