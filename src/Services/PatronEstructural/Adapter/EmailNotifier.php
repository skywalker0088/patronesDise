<?php

namespace App\Services\PatronEstructural\Adapter;

class EmailNotifier implements Notifier
{
    public function send(string $text): string
    {
        return "Enviando EmailNotifier: $text\n";
    }
}
