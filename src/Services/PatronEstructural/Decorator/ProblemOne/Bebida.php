<?php

namespace App\Services\PatronEstructural\Decorator\ProblemOne;

interface Bebida {
    public function getDescripcion(): string;
    public function getCosto(): float;
}
