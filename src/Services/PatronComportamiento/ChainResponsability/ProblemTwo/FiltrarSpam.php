<?php

namespace App\Services\PatronComportamiento\ChainResponsability\ProblemTwo;

class FiltrarSpam extends ManejadorFiltro
{

    protected function puedeFiltrar(string $solicitud): bool
    {
        $problemas = 'htps://spam';
        return str_contains($solicitud, $problemas);
    }
}
