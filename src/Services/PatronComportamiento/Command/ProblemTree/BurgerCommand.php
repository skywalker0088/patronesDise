<?php

namespace App\Services\PatronComportamiento\Command\ProblemTree;


class BurgerCommand implements Command
{
    private Chef $chef;

    public function __construct(Chef $chef)
    {
        $this->chef = $chef;
    }

    public function execute(): string
    {
        return $this->chef->makeBurger();
    }

    public function undo(): void
    {
    }
}
