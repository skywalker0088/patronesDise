<?php

namespace App\Services\AbstractMethod;

interface GUIFactory
{
    public function createButton(): Button;
    public function createWindow(): Window;
}
