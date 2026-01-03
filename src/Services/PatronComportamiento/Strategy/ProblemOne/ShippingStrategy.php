<?php

namespace App\Services\PatronComportamiento\Strategy\ProblemOne;

interface ShippingStrategy
{
    public function calculateCost(float $distance, float $weight): float;
}
