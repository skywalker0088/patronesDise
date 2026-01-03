<?php

namespace App\Services\PatronComportamiento\Strategy\ProblemTwo;

interface PaymentStrategy
{
    public function pay(float $amount): string;
}
