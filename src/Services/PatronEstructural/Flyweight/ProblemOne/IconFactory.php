<?php

namespace App\Services\PatronEstructural\Flyweight\ProblemOne;

class IconFactory
{
    private array $icons = [];

    public function getIcon(string $type): Icon {
        if (!isset($this->icons[$type])) {
            $this->icons[$type] = new Icon($type);
        }
        return $this->icons[$type];
    }

    public function countIcons(): int {
        return count($this->icons);
    }
}
