<?php

namespace App\Services\PatronComportamiento\Strategy\ProblemOne;

class ExpressShipping implements ShippingStrategy
{
    public function calculateCost(float $distance, float $weight): float {
        return $distance - $weight;
    }
}
