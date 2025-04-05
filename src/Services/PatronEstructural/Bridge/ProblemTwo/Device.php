<?php

namespace App\Services\PatronEstructural\Bridge\ProblemTwo;


abstract class Device
{
    protected Platform $platform;

    public function __construct(Platform $platform)
    {
        $this->platform = $platform;
    }

    abstract public function play(string $music): string;
}
