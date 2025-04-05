<?php

namespace App\Controller\PatronEstructural;

use App\Services\PatronEstructural\Adapter\NotificationService;
use App\Services\PatronEstructural\Bridge\ProblemOne\CanvasRenderer;
use App\Services\PatronEstructural\Bridge\ProblemOne\Circle;
use App\Services\PatronEstructural\Bridge\ProblemOne\Square;
use App\Services\PatronEstructural\Bridge\ProblemOne\SvgRenderer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BridgeMethodController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            [
                NotificationService::class => '?' . NotificationService::class,
            ]
        );
    }


    #[Route('/bridge/method', name: 'app_bridge_method')]
    public function index(): Response
    {
        $svgRenderer = new SvgRenderer();
        $canvasRenderer = new CanvasRenderer();

        $circleSvg = new Circle($svgRenderer);
        $circleCanvas = new Circle($canvasRenderer);

        $squareSvg = new Square($svgRenderer);
        $squareCanvas = new Square($canvasRenderer);

        $result = [];

        $result[] = $circleSvg->draw();    // Salida: Dibujando un círculo en formato SVG.
        $result[] = $circleCanvas->draw(); // Salida: Dibujando un círculo en Canvas.
        $result[] = $squareSvg->draw();    // Salida: Dibujando un cuadrado en formato SVG.
        $result[] = $squareCanvas->draw(); // Salida: Dibujando un cuadrado en Canvas.

        return $this->render('adapter_method/index.html.twig', [
            'controller_name' => 'AdapterMethodController',
            'result' => implode(" ", $result)
        ]);
    }
}
