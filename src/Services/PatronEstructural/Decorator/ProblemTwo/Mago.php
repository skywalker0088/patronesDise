<?php

namespace App\Services\PatronEstructural\Decorator\ProblemTwo;


class Mago implements Personaje
{
    public function getDescripcion(): string
    {
        return "Mago";
    }

    public function getAtaque(): int
    {
        return 15;
    }

    public function getDefensa(): int
    {
        return 2;
    }
}
