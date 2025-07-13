<?php

namespace App\Services\PatronComportamiento\Observer\ProblemTwo;

interface Subscriber
{
    public function update(int $saldo): string;
}