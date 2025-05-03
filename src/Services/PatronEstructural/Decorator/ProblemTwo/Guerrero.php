<?php

namespace App\Services\PatronEstructural\Decorator\ProblemTwo;


class Guerrero implements Personaje
{
    public function getDescripcion(): string {
        return "Guerrero";
    }

    public function getAtaque(): int {
        return 10;
    }

    public function getDefensa(): int {
        return 5;
    }
}
