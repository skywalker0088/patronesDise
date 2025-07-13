<?php

namespace App\Services\PatronComportamiento\Observer\ProblemOne;

class SMSSubscriber implements Subscriber
{
    private string $phoneNumber;

    public function __construct(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function update(string $articleTitle): string
    {
        return "📱 Enviando SMS al {$this->phoneNumber}: Nuevo artículo publicado: '$articleTitle'\n";
    }
}
