<?php

namespace App\Services\Result;

/**
 * @template T
 */
class Optional
{
    /** @var T|null */
    private mixed $value;

    private function __construct(mixed $value)
    {
        $this->value = $value;
    }

    /**
     * @param T $value
     * @return Optional<T>
     */
    public static function some(mixed $value): self
    {
        return new self($value);
    }

    /**
     * @return Optional<null>
     */
    public static function none(): self
    {
        return new self(null);
    }

    public function isSome(): bool
    {
        return $this->value !== null;
    }

    public function isNone(): bool
    {
        return $this->value === null;
    }

    /**
     * @return T|null
     */
    public function unwrap(): mixed
    {
        return $this->value;
    }
}