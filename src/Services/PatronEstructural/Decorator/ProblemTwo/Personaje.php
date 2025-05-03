<?php

namespace App\Services\PatronEstructural\Decorator\ProblemTwo;

interface Personaje
{
    public function getDescripcion(): string;
    public function getAtaque(): int;
    public function getDefensa(): int;
}
