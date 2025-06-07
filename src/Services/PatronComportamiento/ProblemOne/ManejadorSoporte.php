<?php

namespace App\Services\PatronComportamiento\ProblemOne;

abstract class ManejadorSoporte {
    protected ?ManejadorSoporte $siguiente = null;

    public function setSiguiente(ManejadorSoporte $manejador): void {
        $this->siguiente = $manejador;
    }

    public function manejar(string $solicitud): string {
        if (!$this->puedeManejar($solicitud)) {
            if ($this->siguiente !== null) {
                return $this->siguiente->manejar($solicitud);
            } else {
                return "Solicitud '$solicitud' no pudo ser resuelta por ningún nivel de soporte.\n";
            }
        } else {
            return static::class . ": Resolviendo '$solicitud'.\n";
        }
    }

    abstract protected function puedeManejar(string $solicitud): bool;
}