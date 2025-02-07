<?php

namespace App\Services\FactoryMethod;

class EmailNotificationService implements Notification
{
    public function send(string $message): string
    {
        return "envio email $message";
    }
}
