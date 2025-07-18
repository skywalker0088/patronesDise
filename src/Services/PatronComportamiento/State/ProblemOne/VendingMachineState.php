<?php

namespace App\Services\PatronComportamiento\State\ProblemOne;

interface VendingMachineState
{
    public function insertCoin(): string;
    public function selectBeverage(): string;
    public function dispense(): string;
}