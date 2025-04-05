<?php

namespace App\Controller\PatronEstructural;

use App\Services\PatronEstructural\Bridge\ProblemOne\CanvasRenderer;
use App\Services\PatronEstructural\Bridge\ProblemOne\Circle;
use App\Services\PatronEstructural\Bridge\ProblemOne\Square;
use App\Services\PatronEstructural\Bridge\ProblemOne\SvgRenderer;
use App\Services\PatronEstructural\Bridge\ProblemTwo\DeviceAdvanced;
use App\Services\PatronEstructural\Bridge\ProblemTwo\DeviceStandard;
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
                DeviceStandard::class => '?' . DeviceStandard::class,
                DeviceAdvanced::class => '?' . DeviceAdvanced::class,
            ]
        );
    }


    #[Route('/bridge/method', name: 'app_bridge_method')]
    public function index(): Response
    {
        $result = [];
        // $svgRenderer = new SvgRenderer();
        // $canvasRenderer = new CanvasRenderer();

        // $circleSvg = new Circle($svgRenderer);
        // $circleCanvas = new Circle($canvasRenderer);

        // $squareSvg = new Square($svgRenderer);
        // $squareCanvas = new Square($canvasRenderer);


        // $result[] = $circleSvg->draw();    // Salida: Dibujando un círculo en formato SVG.
        // $result[] = $circleCanvas->draw(); // Salida: Dibujando un círculo en Canvas.
        // $result[] = $squareSvg->draw();    // Salida: Dibujando un cuadrado en formato SVG.
        // $result[] = $squareCanvas->draw(); // Salida: Dibujando un cuadrado en Canvas.

        $result[]  = $this->container->get(DeviceStandard::class)->play("La canción de la vida");

        return $this->render('adapter_method/index.html.twig', [
            'controller_name' => 'AdapterMethodController',
            'result' => implode(" ", $result)
        ]);
    }
}
