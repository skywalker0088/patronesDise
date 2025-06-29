<?php

namespace App\Services\PatronComportamiento\Mediator\ProblemTwo;

class Avion
{
    public function __construct(
        private string $nombre,
        private TorreDeControl $torreControl
    ) {
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function solicitarAterrizaje(): string
    {
        return $this->torreControl->solicitarAterrizaje($this);
    }

    public function salirDePista(): string
    {
        return $this->torreControl->notificarSalida($this);
    }
}
