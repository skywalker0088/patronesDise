<?php

namespace App\Services\PatronEstructural\Adapter;

class OldSmsService
{
    public function sendSms(string $text) {
        return "Enviando SMS: $text\n";
    }
}