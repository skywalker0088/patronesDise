<?php

namespace App\Services\PatronComportamiento\State\ProblemOne;

class HasCoinState implements VendingMachineState
{
    private VendingMachine $machine;

    public function __construct(VendingMachine $machine)
    {
        $this->machine = $machine;
    }

    public function insertCoin(): string
    {
        return "❌ Ya insertaste una moneda\n";
    }

    public function selectBeverage(): string
    {
        $this->machine->setState(new DispensingState($this->machine));
        $this->machine->dispense();
        return "✅ Bebida seleccionada\n";
    }

    public function dispense(): string
    {
        return "❌ Seleccioná una bebida primero\n";
    }
}
