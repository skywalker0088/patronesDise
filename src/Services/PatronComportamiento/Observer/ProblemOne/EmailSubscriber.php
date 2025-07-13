<?php

namespace App\Services\PatronComportamiento\Observer\ProblemOne;

class EmailSubscriber implements Subscriber
{
    private string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function update(string $articleTitle): string
    {
        return "📧 Enviando email a {$this->email}: Nuevo artículo publicado: '$articleTitle'\n";
    }
}
