<?php

namespace App\Services\PatronComportamiento\ProblemOne;

class SoporteNivel1 extends ManejadorSoporte
{

    protected function puedeManejar(string $solicitud): bool
    {
        $problemas = ['reiniciar el equipo', 'recuperar contraseña'];
        return in_array($solicitud, $problemas);
    }
}
