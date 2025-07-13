<?php

namespace App\Services\PatronComportamiento\Memento\ProblemTwo;

class PlayerMemento
{
    public function __construct(
        protected int $nivel,
        protected int $vida,
        protected int $oro
    ) {}

    public function getNivel(): int
    {
        return $this->nivel;
    }

    public function getVida(): int
    {
        return $this->nivel;
    }

    public function getOro(): int
    {
        return $this->oro;
    }
}
