<?php

namespace App\Services\BuilderMethod;

interface Builder
{
    public function addCoffe(string $size, string $type, array $extras): void;
    public function addTe(string $type, string $size, string $temperature): void;
    public function addSandwich(string $type, array $ingredients, string $size): void;
    public function addPastel(string $type, string $size): void;
}
