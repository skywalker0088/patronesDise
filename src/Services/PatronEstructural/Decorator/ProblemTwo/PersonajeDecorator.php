<?php

namespace App\Services\PatronEstructural\Decorator\ProblemTwo;

abstract class PersonajeDecorator implements Personaje
{
    protected Personaje $personaje;

    public function __construct(Personaje $personaje)
    {
        $this->personaje = $personaje;
    }
}
