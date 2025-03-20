<?php

namespace App\Services\AbstractMethod\Dark;

use App\Services\AbstractMethod\Window;

class DarkWindow implements Window
{
    public function render(): string {
        return 'Rendered Dark Window';
    }
}
