<?php

namespace App\Services\PatronEstructural\Flyweight\ProblemTwo;

class MessageEmoji
{
    private Emoji $emoji;
    private int $x;
    private int $y;
    private int $size;

    public function __construct(Emoji $emoji, int $x, int $y, int $size)
    {
        $this->emoji = $emoji;
        $this->x = $x;
        $this->y = $y;
        $this->size = $size;
    }

    public function render(): string
    {
        return $this->emoji->render($this->x, $this->y, $this->size);
    }
}
