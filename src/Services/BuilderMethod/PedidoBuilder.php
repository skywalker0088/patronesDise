<?php

namespace App\Services\BuilderMethod;

class PedidoBuilder implements Builder
{
    private array $products;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->products = [];
    }

    public function addCoffe(string $size, string $type, array $extras): void
    {
        $extras = "tamano: $size tipo: $type extras: " . implode(", ", $extras);

        $product = new Product();
        $product->setName("Coffee");
        $product->setExtras($extras);

        $this->products[] = $product;
    }

    public function addTe(string $type, string $size, string $temperature): void
    {
        $extras = "tamano: $size tipo: $type temperatura: $temperature";

        $product = new Product();
        $product->setName("Te");
        $product->setExtras($extras);

        $this->products[] = $product;
    }

    public function addSandwich(string $type, array $ingredients, string $size): void
    {
        $extras = "tamano: $size tipo: $type ingredients: " . implode(", ", $ingredients);

        $product = new Product();
        $product->setName("Sandwich");
        $product->setExtras($extras);

        $this->products[] = $product;
    }

    public function addPastel(string $type, string $size): void {
        $extras = "tamano: $size size: $size";

        $product = new Product();
        $product->setName("Pastel");
        $product->setExtras($extras);

        $this->products[] = $product;
    }

    public function build()
    {
        $pedido = new Pedido();
        $pedido->setProducts($this->products);

        return $pedido;
    }
}
