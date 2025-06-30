<?php

namespace App\Services\Result;

interface ResultError
{
    public function getMessage(): string;
}