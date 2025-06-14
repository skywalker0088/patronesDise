<?php

namespace App\Services\PatronComportamiento\ChainResponsability\ProblemTwo;

class FiltrarLongitud extends ManejadorFiltro
{

    protected function puedeFiltrar(string $solicitud): bool
    {
        $longitud = mb_strlen($solicitud, 'UTF-8');
        return $longitud > 5;
    }
}
