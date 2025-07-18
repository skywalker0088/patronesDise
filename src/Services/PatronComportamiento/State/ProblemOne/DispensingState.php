<?php

namespace App\Services\PatronComportamiento\State\ProblemOne;

class DispensingState implements VendingMachineState
{
    private VendingMachine $machine;

    public function __construct(VendingMachine $machine)
    {
        $this->machine = $machine;
    }

    public function insertCoin(): string
    {
        return "⏳ Esperá a que se entregue la bebida\n";
    }

    public function selectBeverage(): string
    {
        return "⏳ Ya seleccionaste una bebida\n";
    }

    public function dispense(): string
    {
        return $this->machine->releaseBeverage();
    }
}
