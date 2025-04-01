<?php

namespace App\Services\PatronEstructural\Adapter;

interface Notifier
{
    public function send(string $message): string;
}
