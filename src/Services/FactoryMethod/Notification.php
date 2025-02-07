<?php

namespace App\Services\FactoryMethod;

interface Notification
{
    public function send(string $message): string;
}
