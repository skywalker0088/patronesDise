<?php

namespace App\Services\PatronEstructural\Decorator\ProblemOne;

class ConCrema extends BebidaDecorator {
    public function getDescripcion(): string {
        return $this->bebida->getDescripcion() . " con crema";
    }

    public function getCosto(): float {
        return $this->bebida->getCosto() + 20.00;
    }
}
