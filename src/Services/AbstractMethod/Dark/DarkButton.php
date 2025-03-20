<?php

namespace App\Services\AbstractMethod\Dark;

use App\Services\AbstractMethod\Button;

class DarkButton implements Button
{
    public function render(): string {
        return 'Rendered Dark Button';
    }
}
