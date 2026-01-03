<?php

namespace App\Services\PatronComportamiento\Strategy\ProblemTwo;

class CreditCardPayment implements PaymentStrategy
{
    public function pay(float $amount): string
    {
        return "Pagando $amount con tarjeta de crédito";
    }
}
