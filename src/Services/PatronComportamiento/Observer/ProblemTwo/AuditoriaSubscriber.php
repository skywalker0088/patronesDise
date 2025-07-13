<?php

namespace App\Services\PatronComportamiento\Observer\ProblemTwo;

class AuditoriaSubscriber implements Subscriber
{
    public function update(int $saldo): string
    {
        return "🧾 Registro de auditoría: guarda un historial de cambios. '$saldo'\n";
    }
}
