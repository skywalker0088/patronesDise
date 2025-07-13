<?php

namespace App\Services\PatronComportamiento\Observer\ProblemTwo;

class AlertaSubscriber implements Subscriber
{
    public function update(int $saldo): string
    {
        if ($saldo > 100) {
            return "";
        }

        return "🧾 Alerta de bajo saldo: muestra una advertencia si el saldo es menor a $100. '$saldo'\n";
    }
}
