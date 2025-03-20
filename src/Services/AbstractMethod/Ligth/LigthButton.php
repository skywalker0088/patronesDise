<?php

namespace App\Services\AbstractMethod\Ligth;

use App\Services\AbstractMethod\Button;

class LigthButton implements Button
{
    public function render(): string {
        return 'Rendered Ligth Button';
    }
}
