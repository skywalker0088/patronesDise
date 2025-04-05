<?php

namespace App\Services\PatronEstructural\Bridge\ProblemOne;

class SvgRenderer implements Renderer
{

    public function render(string $shapeType): string
    {
        return "Dibujando un $shapeType en formato SVG.\n";
    }
}
