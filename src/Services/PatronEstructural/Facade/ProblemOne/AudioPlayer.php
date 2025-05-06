<?php

namespace App\Services\PatronEstructural\Facade\ProblemOne;

class AudioPlayer {
    public function loadAudioFile($path) {
        return "Audio cargado desde: $path\n";
    }

    public function setVolume($level) {
        return "Volumen ajustado a: $level\n";
    }

    public function play() {
        return "Reproduciendo audio...\n";
    }
}