<?php

namespace App\Services\Result;

/**
 * @template T
 * @template E of ResultError
 */
class Result
{
    /** @var T|E */
    private mixed $value;

    private bool $isOk;

    /**
     * @param bool $isOk
     * @param T|E $value
     */
    private function __construct(bool $isOk, mixed $value)
    {
        $this->isOk = $isOk;
        $this->value = $value;
    }

    /**
     * @param T $value
     * @return Result<T, never>
     */
    public static function ok(mixed $value): self
    {
        return new self(true, $value);
    }

    /**
     * @param E $error
     * @return Result<never, E>
     */
    public static function err(ResultError $error): self
    {
        return new self(false, $error);
    }

    public function isOk(): bool
    {
        return $this->isOk;
    }

    public function isErr(): bool
    {
        return !$this->isOk;
    }

    /**
     * @return T
     */
    public function unwrap(): mixed
    {
        if (!$this->isOk) {
            throw new \RuntimeException("Tried to unwrap an Err");
        }
        return $this->value;
    }

    /**
     * @return E
     */
    public function unwrapErr(): ResultError
    {
        if ($this->isOk) {
            throw new \RuntimeException("Tried to unwrapErr an Ok");
        }
        return $this->value;
    }

    public function map(callable $fn): self
    {
        if ($this->isOk) {
            return self::ok($fn($this->value));
        }
        return $this;
    }

    public function mapErr(callable $fn): self
    {
        if (!$this->isOk) {
            return self::err($fn($this->value));
        }
        return $this;
    }

    /**
     * @template R
     * @param callable(T): R $onOk
     * @param callable(E): R $onErr
     * @return R
     */
    public function fold(callable $onOk, callable $onErr): mixed
    {
        return $this->isOk ? $onOk($this->value) : $onErr($this->value);
    }
}
