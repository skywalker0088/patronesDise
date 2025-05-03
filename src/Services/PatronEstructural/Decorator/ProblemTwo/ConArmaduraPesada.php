<?php

namespace App\Services\PatronEstructural\Decorator\ProblemTwo;

class ConArmaduraPesada extends PersonajeDecorator
{

    public function getDescripcion(): string
    {
        return $this->personaje->getDescripcion() . " con armadura pesada";
    }

    public function getAtaque(): int
    {
        return $this->personaje->getAtaque();
    }

    public function getDefensa(): int
    {
        return $this->personaje->getDefensa() + 10;
    }
}
