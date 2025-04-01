<?php

namespace App\Services\PatronEstructural\Adapter;

class OldSmsAdapterService implements Notifier
{
    public function __construct(
        protected OldSmsService $oldSmsService
    ) {}

    public function send(string $text): string
    {
        return $this->oldSmsService->sendSms($text);
    }
}
