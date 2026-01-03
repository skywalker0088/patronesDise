<?php

namespace App\Services\PatronComportamiento\Strategy\ProblemOne;

class StandardShipping implements ShippingStrategy
{
    public function calculateCost(float $distance, float $weight): float
    {
        return $distance * $weight;
    }
}
