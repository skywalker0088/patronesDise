<?php

namespace App\Services\PatronEstructural\Bridge\ProblemOne;

class Circle extends Shape
{
    public function draw(): string
    {
        return $this->renderer->render("círculo");
    }
}
