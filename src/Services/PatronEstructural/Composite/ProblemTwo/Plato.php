<?php

namespace App\Services\PatronEstructural\Composite\ProblemTwo;


class Plato extends ItemMenu {
    private $precio;

    public function __construct(string $nombre, int $precio) {
        parent::__construct($nombre);
        $this->precio = $precio;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getPrecio(): int {
        return $this->precio;
    }

    public function mostrar(): string {
        return "Plato: {$this->nombre}, Precio: {$this->getPrecio()}";
    }
}