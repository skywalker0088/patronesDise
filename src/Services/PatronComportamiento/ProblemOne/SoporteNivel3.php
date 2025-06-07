<?php

namespace App\Services\PatronComportamiento\ProblemOne;

class SoporteNivel3 extends ManejadorSoporte
{
    protected function puedeManejar(string $solicitud): bool
    {
        $problemas = ['error de hardware', 'datos corruptos'];
        return in_array($solicitud, $problemas);
    }
}
