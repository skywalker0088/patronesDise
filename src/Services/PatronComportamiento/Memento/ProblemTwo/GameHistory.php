<?php

namespace App\Services\PatronComportamiento\Memento\ProblemTwo;

class GameHistory
{
    /** @var PlayerMemento[] */
    private array $mementos = [];

    public function save(Player $player): void
    {
        $this->mementos[] = $player->save();
    }

    public function undo(): ?PlayerMemento
    {
        return array_pop($this->mementos) ?? null;
    }
}
