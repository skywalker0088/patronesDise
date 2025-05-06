<?php

namespace App\Services\PatronEstructural\Facade\ProblemOne;

class VideoPlayer {
    public function loadVideoFile($path) {
        return "Video cargado desde: $path\n";
    }

    public function setResolution($width, $height) {
        return "Resolución establecida en: {$width}x{$height}\n";
    }

    public function play() {
        return "Reproduciendo video...\n";
    }
}