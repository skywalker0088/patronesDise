<?php

namespace App\Services\PatronEstructural\Composite\ProblemOne;

class Archivo extends ElementoSistema {
    private $tamaño;

    public function __construct(string $nombre, int $tamaño) {
        parent::__construct($nombre);
        $this->tamaño = $tamaño;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getTamaño(): int {
        return $this->tamaño;
    }

    public function imprimirEstructura(string $prefijo = ''): string {
        return $prefijo . "Archivo: {$this->nombre} ({$this->tamaño} KB)\n";
    }
}