<?php

namespace App\Services\PatronEstructural\Decorator\ProblemOne;

class Te implements Bebida {
    public function getDescripcion(): string {
        return "Te";
    }

    public function getCosto(): float {
        return 4.00;
    }
}
