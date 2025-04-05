<?php

namespace App\Services\PatronEstructural\Bridge\ProblemOne;

class Square extends Shape
{
    public function draw(): string
    {
        return $this->renderer->render("cuadrado");
    }
}
