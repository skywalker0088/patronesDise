<?php

namespace App\Services\PatronEstructural\Decorator\ProblemOne;

abstract class BebidaDecorator implements Bebida {
    protected Bebida $bebida;

    public function __construct(Bebida $bebida) {
        $this->bebida = $bebida;
    }
}