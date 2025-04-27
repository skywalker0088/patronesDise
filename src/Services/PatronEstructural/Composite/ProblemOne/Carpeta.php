<?php

namespace App\Services\PatronEstructural\Composite\ProblemOne;

class Carpeta extends ElementoSistema {
    /** @var ElementoSistema[] */
    private $elementos = [];

    public function agregar(ElementoSistema $elemento): void {
        $this->elementos[] = $elemento;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getTamaño(): int {
        $total = 0;
        foreach ($this->elementos as $e) {
            $total += $e->getTamaño();
        }
        return $total;
    }

    public function imprimirEstructura(string $prefijo = ''): string {
        $result = [];
        $result[] = $prefijo . "Carpeta: {$this->nombre} ({$this->getTamaño()} KB)\n";

        foreach ($this->elementos as $e) {
            $result[] = $e->imprimirEstructura($prefijo . "  ");
        }

        return implode(", ", $result);
    }
}