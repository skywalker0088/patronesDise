<?php

namespace App\Services\AbstractMethod;

use App\Services\AbstractMethod\Dark\CreateDarkThemeFactory;
use App\Services\AbstractMethod\Ligth\CreateLigthThemeFactory;

class CreateGUIService
{
    public const THEME_LIGHT = 1;
    public const THEME_DARK = 2;

    public function __construct(
        protected CreateDarkThemeFactory $createDarkThemeFactory,
        protected CreateLigthThemeFactory $createLigthThemeFactory
    ) {}

    public function execute(int $themeSelect): GUIFactory
    {
        $theme = null;

        switch ($themeSelect) {
            case self::THEME_LIGHT:
                $theme = $this->createLigthThemeFactory;
                break;

            case self::THEME_DARK:
                $theme = $this->createDarkThemeFactory;
                break;

            default:
                $theme = null;
                break;
        }

        return $theme;
    }
}
