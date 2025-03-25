<?php

namespace App\Controller;

use App\Services\BuilderMethod\PedidoBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BuilderMethodController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            [
                PedidoBuilder::class => '?' . PedidoBuilder::class,
            ]
        );
    }

    #[Route('/builder/method', name: 'app_builder_method')]
    public function index(): Response
    {
        $this->container->get(PedidoBuilder::class)->reset();
        $this->container->get(PedidoBuilder::class)->addCoffe(
            "pequeño",
            "entera",
            ["azucar"]
        );
        $this->container->get(PedidoBuilder::class)->addTe(
            "verde",
            "grande",
            "caliente"
        );

        $result = [];
        $pedido = $this->container->get(PedidoBuilder::class)->build();

        foreach ($pedido->getProducts() as $producto) {
            $result[] = $producto->__toString();
        }

        return $this->render('builder_method/index.html.twig', [
            'controller_name' => 'PrototypeMethodController',
            'result' => implode(", ", $result)
        ]);
    }
}
