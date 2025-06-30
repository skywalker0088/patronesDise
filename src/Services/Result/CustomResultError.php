<?php

namespace App\Services\Result;

/**
 * Class CustomResultError
 * @package App\Services\Result
 */
class CustomResultError implements ResultError
{
    public function __construct(protected string $message) {}

    public function getMessage(): string
    {
        return $this->message;
    }
}
