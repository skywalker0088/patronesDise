<?php

namespace App\Services\PatronComportamiento\Memento\ProblemTwo;

class Player
{
    private int $nivel = 1;
    private int $vida = 100;
    private int $oro = 0;

    public function subirNivel()
    {
        $this->nivel++;
    }

    public function recibirDanio(): void
    {
        $this->vida--;
    }

    public function ganarOro(int $oro): void
    {
        $this->oro += $oro;
    }

    public function save(): PlayerMemento
    {
        return new PlayerMemento($this->nivel, $this->vida, $this->oro);
    }

    public function restore(PlayerMemento $playerMemento): void
    {
        $this->nivel = $playerMemento->getNivel();
        $this->vida = $playerMemento->getVida();
        $this->oro = $playerMemento->getOro();
    }

    public function getStatus(): string
    {
        return "Nivel {$this->nivel}, Vida {$this->vida}, Oro {$this->oro}";
    }
}
