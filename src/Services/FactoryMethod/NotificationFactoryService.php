<?php

namespace App\Services\FactoryMethod;


class NotificationFactoryService
{
    public const SMS = 1;
    public const EMAIL = 2;

    private int $type = self::EMAIL;

    public function __construct(
        protected EmailNotificationService $emailNotificationService,
        protected SMSNotificationService $smsNotificationService
    ) {}

    public function createNotification(): ?Notification
    {
        $notification = null;

        switch ($this->type) {
            case self::EMAIL:
                $notification = $this->emailNotificationService;
                break;

            case self::SMS:
                $notification = $this->smsNotificationService;
                break;

            default:
                $notification = null;

                break;
        }

        return $notification;
    }
}
