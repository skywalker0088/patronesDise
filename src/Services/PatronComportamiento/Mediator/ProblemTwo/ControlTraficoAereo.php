<?php

namespace App\Services\PatronComportamiento\Mediator\ProblemTwo;

interface ControlTraficoAereo
{
    public function solicitarAterrizaje(Avion $avion): string;
    public function notificarSalida(Avion $avion): string;
}
