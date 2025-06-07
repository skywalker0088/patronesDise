<?php

namespace App\Services\PatronComportamiento\ProblemOne;

class SoporteNivel2 extends ManejadorSoporte
{
    protected function puedeManejar(string $solicitud): bool
    {
        $problemas = ['problema de red', 'error de software'];
        return in_array($solicitud, $problemas);
    }
}
