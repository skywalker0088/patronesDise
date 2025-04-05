<?php

namespace App\Services\PatronEstructural\Bridge\ProblemTwo;

class YoutubePlatform implements Platform
{

    public function render(string $music): string
    {
        return "Renderizando $music en plataforma youtube.\n";
    }
}
