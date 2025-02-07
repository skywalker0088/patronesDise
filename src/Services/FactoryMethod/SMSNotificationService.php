<?php

namespace App\Services\FactoryMethod;

class SMSNotificationService implements Notification
{
    public function send(string $message): string
    {
        return "envio sms $message";
    }
}
