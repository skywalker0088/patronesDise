<?php

namespace App\Services\PatronEstructural\Bridge\ProblemTwo;

class SpotifyPlatform implements Platform
{

    public function render(string $music): string
    {
        return "Renderizando $music en plataforma spotify.\n";
    }
}
