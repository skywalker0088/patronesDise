<?php

namespace App\Services\PatronComportamiento\Strategy\ProblemTwo;

use InvalidArgumentException;

class PaymentProcessor
{
    private PaymentStrategy $strategy;

    public function setStrategy(PaymentStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function process(float $amount): string
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException('El monto debe ser mayor a cero');
        }

        return $this->strategy->pay($amount);
    }
}
