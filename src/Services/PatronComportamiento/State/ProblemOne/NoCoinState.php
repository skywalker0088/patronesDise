<?php

namespace App\Services\PatronComportamiento\State\ProblemOne;

class NoCoinState implements VendingMachineState
{
    private VendingMachine $machine;

    public function __construct(VendingMachine $machine)
    {
        $this->machine = $machine;
    }

    public function insertCoin(): string
    {
        $this->machine->setState(new HasCoinState($this->machine));
        return "🪙 Moneda insertada\n";
    }

    public function selectBeverage(): string
    {
        return "❌ Insertá una moneda primero\n";
    }

    public function dispense(): string
    {
        return "❌ Insertá una moneda y seleccioná una bebida primero\n";
    }
}
