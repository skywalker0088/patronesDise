<?php

namespace App\Services\PatronComportamiento\Command\ProblemTwo;

class EditorInvoker
{
    private array $history = [];

    public function executeCommand(Command $command): void
    {
        $command->execute();
        $this->history[] = $command;
    }

    public function undo(): void
    {
        if (!empty($this->history)) {
            $lastCommand = array_pop($this->history);
            $lastCommand->undo();
        } else {
            echo "Nada para deshacer.\n";
        }
    }
}
