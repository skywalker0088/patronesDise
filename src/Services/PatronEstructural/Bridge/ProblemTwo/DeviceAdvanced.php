<?php

namespace App\Services\PatronEstructural\Bridge\ProblemTwo;


class DeviceAdvanced extends Device
{

    public function play(string $music): string
    {
        return $this->platform->render("$music con equalizacion avanzada.");
    }
}
