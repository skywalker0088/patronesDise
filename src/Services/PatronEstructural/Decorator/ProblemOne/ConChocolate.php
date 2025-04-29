<?php

namespace App\Services\PatronEstructural\Decorator\ProblemOne;

class ConChocolate extends BebidaDecorator {
    public function getDescripcion(): string {
        return $this->bebida->getDescripcion() . " con chocalete";
    }

    public function getCosto(): float {
        return $this->bebida->getCosto() + 2.00;
    }
}
