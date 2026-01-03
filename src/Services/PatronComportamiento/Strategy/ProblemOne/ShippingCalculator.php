<?php

namespace App\Services\PatronComportamiento\Strategy\ProblemOne;

class ShippingCalculator
{
    protected ShippingStrategy $expressShipping;

    public function setExpressShipping(ShippingStrategy $expressShipping)
    {
        $this->expressShipping = $expressShipping;
    }

    public function calculate(float $distance, float $weight)
    {
        return $this->expressShipping->calculateCost($distance, $weight);
    }
}
