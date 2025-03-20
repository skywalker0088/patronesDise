<?php

namespace App\Services\AbstractMethod\Ligth;

use App\Services\AbstractMethod\Window;

class LigthWindow implements Window
{
    public function render(): string {
        return 'Rendered Ligth Window';
    }
}
