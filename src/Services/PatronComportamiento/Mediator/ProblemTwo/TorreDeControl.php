<?php

namespace App\Services\PatronComportamiento\Mediator\ProblemTwo;

class TorreDeControl implements ControlTraficoAereo
{
    private ?Avion $avionEnPista = null;
    private array $colaDeEspera = [];

    public function solicitarAterrizaje(Avion $avion): string
    {
        $return = [];
        $return[] = "{$avion->getNombre()} solicita aterrizaje.\n";
        if ($this->avionEnPista === null) {
            $this->avionEnPista = $avion;
            $return[] = "✅ Pista libre. {$avion->getNombre()} aterriza.\n";
        } else {
            $return[] = "⏳ Pista ocupada. {$avion->getNombre()} espera.\n";
            $this->colaDeEspera[] = $avion;
        }

        return implode(",", $return);
    }

    public function notificarSalida(Avion $avion): string
    {
        $return = [];
        
        $return[] = "{$avion->getNombre()} ha salido de la pista.\n";

        if ($this->avionEnPista === $avion) {
            $this->avionEnPista = null;
        }

        if (!empty($this->colaDeEspera)) {
            $siguiente = array_shift($this->colaDeEspera);
            $return[] = $this->solicitarAterrizaje($siguiente);
        }

        return implode(",", $return);
    }
}
