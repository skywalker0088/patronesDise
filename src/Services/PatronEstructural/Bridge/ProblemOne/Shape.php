<?php

namespace App\Services\PatronEstructural\Bridge\ProblemOne;

abstract class Shape {
    protected Renderer $renderer;

    public function __construct(Renderer $renderer) {
        $this->renderer = $renderer;
    }

    abstract public function draw(): string;
}
