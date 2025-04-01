<?php

namespace App\Services\PatronEstructural\Adapter;

class NotificationService
{
    public function __construct(
        // protected EmailNotifier $notifyService
        protected OldSmsAdapterService $notifyService
    ) {}

    public function execute(string $text): string
    {
        return $this->notifyService->send($text);
    }
}
