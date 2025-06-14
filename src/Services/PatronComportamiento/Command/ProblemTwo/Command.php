<?php

namespace App\Services\PatronComportamiento\Command\ProblemTwo;

interface Command
{
    public function execute(): void;
    public function undo(): void;
}
