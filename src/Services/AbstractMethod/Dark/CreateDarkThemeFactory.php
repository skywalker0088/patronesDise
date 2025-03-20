<?php

namespace App\Services\AbstractMethod\Dark;

use App\Services\AbstractMethod\Button;
use App\Services\AbstractMethod\GUIFactory;
use App\Services\AbstractMethod\Window;

class CreateDarkThemeFactory implements GUIFactory
{
    public function createButton(): Button
    {
        $button = new DarkButton();

        return $button;
    }

    public function createWindow(): Window
    {
        $window = new DarkWindow();

        return $window;
    }
}
