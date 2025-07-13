<?php

namespace App\Services\PatronComportamiento\Observer\ProblemTwo;

class CuentaBancaria
{
    private array $subscribers = [];
    private $saldo = 0;

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

    public function agregarSaldo(int $saldo): array
    {
        $this->saldo += $saldo;
        return $this->notifySubscribers($this->saldo);
    }


    public function extraerSaldo(int $saldo): array
    {
        $this->saldo -= $saldo;
        return $this->notifySubscribers($this->saldo);
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
