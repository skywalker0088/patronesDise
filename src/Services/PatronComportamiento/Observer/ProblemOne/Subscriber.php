<?php

namespace App\Services\PatronComportamiento\Observer\ProblemOne;

interface Subscriber
{
    public function update(string $articleTitle): string;
}