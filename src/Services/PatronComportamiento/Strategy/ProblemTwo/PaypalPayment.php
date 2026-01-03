<?php

namespace App\Services\PatronComportamiento\Strategy\ProblemTwo;

class PaypalPayment implements PaymentStrategy
{
    public function pay(float $amount): string
    {
        return "Pagando $amount con PayPal";
    }
}
