<?php

namespace App\Services\PatronEstructural\Bridge\ProblemTwo;


class DeviceStandard extends Device
{

    public function play(string $music): string {
        return $this->platform->render($music);
    }
}
