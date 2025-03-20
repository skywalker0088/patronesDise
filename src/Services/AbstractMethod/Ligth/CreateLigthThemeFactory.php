<?php

namespace App\Services\AbstractMethod\Ligth;

use App\Services\AbstractMethod\Button;
use App\Services\AbstractMethod\GUIFactory;
use App\Services\AbstractMethod\Window;

class CreateLigthThemeFactory implements GUIFactory
{
    public function createButton(): Button
    {
        $button = new LigthButton();

        return $button;
    }

    public function createWindow(): Window
    {
        $window = new LigthWindow();

        return $window;
    }
}
