<?php

namespace App\Services\PatronEstructural\Flyweight\ProblemTwo;

class Emoji
{
    private string $symbol;
    private string $imagePath;
    private string $animation;

    public function __construct(string $symbol, string $imagePath, string $animation = '') {
        $this->symbol = $symbol;
        $this->imagePath = $imagePath;
        $this->animation = $animation;
    }

    public function render(int $x, int $y, int $size): string
    {
        return "🖼️ Renderizando '{$this->symbol}' en ($x, $y) con tamaño {$size}px\n";
    }
}
