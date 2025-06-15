<?php

namespace App\Services\PatronComportamiento\Command\ProblemTree;


class Waiter
{
    private array $commandArray;


    public function takeOrder(Command $command): void
    {
        $this->commandArray[] = $command;
    }

    public function undo(): void
    {
        if (!empty($this->history)) {
            $lastCommand = array_pop($this->commandArray);
            $lastCommand->undo();
        } else {
            echo "Nada para deshacer.\n";
        }
    }

    public function sendOrders(): string
    {
        $cooks = [];
        foreach ($this->commandArray as $command) {
            $cooks[] = $command->execute();
        }

        return implode(" ", $cooks);
    }
}
