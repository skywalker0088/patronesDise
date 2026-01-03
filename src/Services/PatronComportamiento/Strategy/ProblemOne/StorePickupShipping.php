<?php

namespace App\Services\PatronComportamiento\Strategy\ProblemOne;

class StorePickupShipping implements ShippingStrategy
{
    public function calculateCost(float $distance, float $weight): float {
        return $distance / $weight;
    }
}
