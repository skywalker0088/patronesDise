<?php

namespace App\Services\PatronComportamiento\Command\ProblemOne;

interface Command {
    public function execute(): string;
    public function undo(): string;
}