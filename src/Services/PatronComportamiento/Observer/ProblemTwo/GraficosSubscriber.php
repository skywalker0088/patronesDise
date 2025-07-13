<?php

namespace App\Services\PatronComportamiento\Observer\ProblemTwo;

class GraficosSubscriber implements Subscriber
{
    public function update(int $saldo): string
    {
        return "📊 Actualizador de gráficos: actualiza visualizaciones en tiempo real.: '$saldo'\n";
    }
}
