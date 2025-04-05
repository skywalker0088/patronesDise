<?php

namespace App\Services\PatronEstructural\Bridge\ProblemOne;

class CanvasRenderer implements Renderer
{

    public function render(string $shapeType): string
    {
        return "Dibujando un $shapeType en formato Canvas.\n";
    }
}
