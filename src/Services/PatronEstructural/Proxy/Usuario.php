<?php

namespace App\Services\PatronEstructural\Proxy;

class Usuario
{
    public $nombre;
    public $tienePermiso;

    public function __construct($nombre, $tienePermiso) {
        $this->nombre = $nombre;
        $this->tienePermiso = $tienePermiso;
    }
}
