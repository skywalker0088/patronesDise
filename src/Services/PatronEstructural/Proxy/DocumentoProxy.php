<?php

namespace App\Services\PatronEstructural\Proxy;

class DocumentoProxy
{
    private $documentoReal;
    private $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
        $this->documentoReal = new DocumentoConfidencial();
    }

    public function mostrarContenido()
    {
        if ($this->usuario->tienePermiso) {
            return $this->documentoReal->mostrarContenido();
        } else {
            return "🚫 Acceso denegado: el usuario '{$this->usuario->nombre}' no tiene permiso.";
        }
    }
}
