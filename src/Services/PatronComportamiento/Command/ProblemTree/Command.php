<?php

namespace App\Services\PatronComportamiento\Command\ProblemTree;

interface Command
{
    public function execute(): string;
    public function undo(): void;
}
