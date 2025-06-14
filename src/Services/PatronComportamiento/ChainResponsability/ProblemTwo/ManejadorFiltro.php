<?php

namespace App\Services\PatronComportamiento\ChainResponsability\ProblemTwo;

abstract class ManejadorFiltro {
    protected ?ManejadorFiltro $siguiente = null;

    public function setSiguiente(ManejadorFiltro $manejador): void {
        $this->siguiente = $manejador;
    }

    public function filtrar(string $solicitud): string {
        if (!$this->puedeFiltrar($solicitud)) {
            if ($this->siguiente !== null) {
                return $this->siguiente->filtrar($solicitud);
            } else {
                return "Solicitud '$solicitud' es correcta no ha encontrado falla al filtrar.\n";
            }
        } else {
            return static::class . ": Resolviendo '$solicitud'.\n";
        }
    }

    abstract protected function puedeFiltrar(string $solicitud): bool;
}