<?php

namespace App\Services\PatronComportamiento\Command\ProblemOne;

class RemoteControl
{
    private array $onCommands = [];
    private array $offCommands = [];
    private ?Command $undoCommand = null;

    public function setCommand(int $slot, Command $onCommand, Command $offCommand): void
    {
        $this->onCommands[$slot] = $onCommand;
        $this->offCommands[$slot] = $offCommand;
    }

    public function pressOnButton(int $slot): void
    {
        echo "Presionando botón ON del slot {$slot}...\n";
        $this->onCommands[$slot]->execute();
        $this->undoCommand = $this->onCommands[$slot];
    }

    public function pressOffButton(int $slot): void
    {
        echo "Presionando botón OFF del slot {$slot}...\n";
        $this->offCommands[$slot]->execute();
        $this->undoCommand = $this->offCommands[$slot];
    }

    public function pressUndo(): void
    {
        echo "Presionando botón UNDO...\n";
        if ($this->undoCommand) {
            $this->undoCommand->undo();
        }
    }
}
