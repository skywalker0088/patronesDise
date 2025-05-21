<?php

namespace App\Services\PatronEstructural\Flyweight\ProblemOne;

class User
{
    private int $x;
    private int $y;
    private Icon $icon;

    public function __construct(int $x, int $y, Icon $icon)
    {
        $this->x = $x;
        $this->y = $y;
        $this->icon = $icon;
    }

    public function render(): string
    {
        return $this->icon->render($this->x, $this->y);
    }
}
