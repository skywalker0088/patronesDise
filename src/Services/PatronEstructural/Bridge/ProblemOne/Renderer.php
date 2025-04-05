<?php

namespace App\Services\PatronEstructural\Bridge\ProblemOne;

interface Renderer
{
    public function render(string $shapeType): string;
}
