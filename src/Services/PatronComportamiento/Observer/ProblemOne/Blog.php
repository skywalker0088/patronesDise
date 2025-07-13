<?php

namespace App\Services\PatronComportamiento\Observer\ProblemOne;

class Blog
{
    private array $subscribers = [];

    public function addSubscriber(Subscriber $subscriber): void
    {
        $this->subscribers[] = $subscriber;
    }

    public function removeSubscriber(Subscriber $subscriber): void
    {
        $this->subscribers = array_filter(
            $this->subscribers,
            fn($sub) => $sub !== $subscriber
        );
    }

    public function publishArticle(string $title): array
    {
        return $this->notifySubscribers($title);
    }

    private function notifySubscribers(string $title): array
    {
        $return = [];

        foreach ($this->subscribers as $subscriber) {
            $return[] = $subscriber->update($title);
        }

        return $return;
    }
}
