<?php

namespace App\Services\PatronEstructural\Composite\ProblemTwo;

abstract class ItemMenu {
    protected $nombre;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    abstract public function getNombre(): string;
    abstract public function getPrecio(): int;
    abstract public function mostrar(): string;
}
