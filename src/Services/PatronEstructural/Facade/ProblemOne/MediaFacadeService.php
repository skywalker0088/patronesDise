<?php

namespace App\Services\PatronEstructural\Facade\ProblemOne;

class MediaFacadeService
{
    public function __construct(
        protected AudioPlayer $audioPlayer,
        protected VideoPlayer $videoPlayer,
        protected SubtitleManager $subtitleManager
    ) {}

    public function playMovie($videoPath, $subtitlePath = null)
    {
        $return = [];
        $return[] = "Iniciando reproducción de película...\n";

        $return[] = $this->audioPlayer->loadAudioFile($videoPath); // simplificación
        $return[] = $this->audioPlayer->setVolume(70);

        $return[] =  $this->videoPlayer->loadVideoFile($videoPath);
        $return[] = $this->videoPlayer->setResolution(1920, 1080);

        if ($subtitlePath) {
            $return[] = $this->subtitleManager->loadSubtitleFile($subtitlePath);
            $return[] = $this->subtitleManager->syncWithVideo();
            $return[] = $this->subtitleManager->enableSubtitles();
        }

        $return[] = $this->audioPlayer->play();
        $return[] = $this->videoPlayer->play();

        $return[] =  "Película en reproducción\n";

        return implode(", ", $return);
    }
}
