<?php

namespace App\Services\PatronEstructural\Decorator\ProblemTwo;

class ConAmuletoDeProteccion extends PersonajeDecorator
{

    public function getDescripcion(): string
    {
        return $this->personaje->getDescripcion() . " con amuleto de proteccion";
    }

    public function getAtaque(): int
    {
        return $this->personaje->getAtaque() + 5;
    }

    public function getDefensa(): int
    {
        return $this->personaje->getDefensa() + 5;
    }
}
