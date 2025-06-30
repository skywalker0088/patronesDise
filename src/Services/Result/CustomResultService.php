<?php

namespace App\Services\Result;

use RuntimeException;

class CustomResultService
{
    public function execute(int $a, int $b): Result
    {
        if ($b == 0) {
            return Result::err(new CustomResultError("No se puede dividir por 0"));
        }

        try {
            return Result::ok(Optional::some($a / $b));
            // return Result::ok($user !== null ? Optional::some($user) : Optional::none());
        } catch (RuntimeException $e) {
            return Result::err(new CustomResultError("No se puede dividir por 0"));
        }
    }
}
