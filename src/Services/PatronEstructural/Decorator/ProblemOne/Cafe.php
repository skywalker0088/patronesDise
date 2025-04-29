<?php

namespace App\Services\PatronEstructural\Decorator\ProblemOne;

class Cafe implements Bebida {
    public function getDescripcion(): string {
        return "Café";
    }

    public function getCosto(): float {
        return 5.00;
    }
}
