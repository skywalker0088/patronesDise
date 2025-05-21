<?php

namespace App\Services\PatronEstructural\Flyweight\ProblemOne;

class Icon
{
    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function render(int $x, int $y): string
    {
        return "📍 Renderizando '{$this->type}' en posición ({$x}, {$y})\n";
    }
}
