<?php

namespace App\Services\PatronComportamiento\State\ProblemOne;

class OutOfStockState implements VendingMachineState
{
    private VendingMachine $machine;

    public function __construct(VendingMachine $machine)
    {
        $this->machine = $machine;
    }

    public function insertCoin(): string
    {
        return "❌ No hay más bebidas, moneda rechazada\n";
    }

    public function selectBeverage(): string
    {
        return "❌ No hay más bebidas disponibles\n";
    }

    public function dispense(): string
    {
        return "❌ No se puede entregar nada\n";
    }
}
