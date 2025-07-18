<?php

namespace App\Services\PatronComportamiento\State\ProblemOne;

class VendingMachine
{
    private VendingMachineState $state;
    private int $stock;

    public function __construct(int $stock)
    {
        $this->stock = $stock;

        if ($this->stock > 0) {
            $this->state = new NoCoinState($this);
        } else {
            $this->state = new OutOfStockState($this);
        }
    }

    public function setState(VendingMachineState $state): void
    {
        $this->state = $state;
    }

    public function insertCoin(): string
    {
        return $this->state->insertCoin();
    }

    public function selectBeverage(): string
    {
        return $this->state->selectBeverage();
    }

    public function dispense(): string
    {
        return $this->state->dispense();
    }

    public function releaseBeverage(): string
    {
        $return = "";

        if ($this->stock > 0) {
            $return = "🍹 Se entrega una bebida\n";
            $this->stock--;
        }

        if ($this->stock === 0) {
            $this->setState(new OutOfStockState($this));
        } else {
            $this->setState(new NoCoinState($this));
        }

        return $return;
    }

    public function getStock(): int
    {
        return $this->stock;
    }
}
