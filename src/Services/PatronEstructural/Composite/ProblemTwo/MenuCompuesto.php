<?php

namespace App\Services\PatronEstructural\Composite\ProblemTwo;


class MenuCompuesto extends ItemMenu
{
    private $itemMenu = [];

    public function __construct(string $nombre)
    {
        parent::__construct($nombre);
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function agregarItem(ItemMenu $itemMenu)
    {
        $this->itemMenu[] = $itemMenu;
    }

    public function getPrecio(): int
    {
        $total = 0;
        foreach ($this->itemMenu as $item) {
            $total += $item->getPrecio();
        }
        return $total;
    }

    public function mostrar(): string
    {
        $result = [];

        foreach ($this->itemMenu as $itemMen) {
            $result[] = $itemMen->mostrar();
        }

        return implode(", ", $result);
    }
}
