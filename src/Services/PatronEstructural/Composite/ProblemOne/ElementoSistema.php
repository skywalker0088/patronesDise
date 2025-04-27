<?php

namespace App\Services\PatronEstructural\Composite\ProblemOne;

abstract class ElementoSistema {
    protected $nombre;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    abstract public function getNombre(): string;
    abstract public function getTamaño(): int;
    abstract public function imprimirEstructura(string $prefijo = ''): string;
}
