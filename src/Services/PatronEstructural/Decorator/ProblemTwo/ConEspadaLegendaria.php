<?php

namespace App\Services\PatronEstructural\Decorator\ProblemTwo;

class ConEspadaLegendaria extends PersonajeDecorator
{

    public function getDescripcion(): string
    {
        return $this->personaje->getDescripcion() . " con espada legendaria";
    }

    public function getAtaque(): int
    {
        return $this->personaje->getAtaque() + 15;
    }

    public function getDefensa(): int
    {
        return $this->personaje->getDefensa();
    }
}
