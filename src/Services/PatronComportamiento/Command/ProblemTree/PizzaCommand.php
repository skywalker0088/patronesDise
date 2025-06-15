<?php

namespace App\Services\PatronComportamiento\Command\ProblemTree;


class PizzaCommand implements Command
{
    private Chef $chef;

    public function __construct(Chef $chef)
    {
        $this->chef = $chef;
    }

    public function execute(): string
    {
        return $this->chef->makePizza();
    }

    public function undo(): void
    {
    }
}
