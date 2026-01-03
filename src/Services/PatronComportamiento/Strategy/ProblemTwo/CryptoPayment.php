<?php

namespace App\Services\PatronComportamiento\Strategy\ProblemTwo;

class CryptoPayment implements PaymentStrategy
{
    public function pay(float $amount): string
    {
        return "Pagando $amount en criptomonedas";
    }
}
