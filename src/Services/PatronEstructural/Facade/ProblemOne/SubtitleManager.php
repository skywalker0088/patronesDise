<?php

namespace App\Services\PatronEstructural\Facade\ProblemOne;

class SubtitleManager {
    public function loadSubtitleFile($path) {
        return "Subtítulos cargados desde: $path\n";
    }

    public function syncWithVideo() {
        return "Subtítulos sincronizados con el video\n";
    }

    public function enableSubtitles() {
        return "Subtítulos activados\n";
    }
}