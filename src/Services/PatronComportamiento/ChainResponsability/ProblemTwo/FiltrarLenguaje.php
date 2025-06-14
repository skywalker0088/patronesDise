<?php

namespace App\Services\PatronComportamiento\ChainResponsability\ProblemTwo;

class FiltrarLenguaje extends ManejadorFiltro
{

    protected function puedeFiltrar(string $solicitud): bool
    {
        $problemas = ['boludo', 'pelotudo'];
        return in_array($solicitud, $problemas);
    }
}
