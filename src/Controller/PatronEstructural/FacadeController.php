<?php

namespace App\Controller\PatronEstructural;

use App\Services\PatronEstructural\Facade\ProblemOne\MediaFacadeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FacadeController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            [
                MediaFacadeService::class => '?' . MediaFacadeService::class,
            ]
        );
    }


    #[Route('/facade/method ', name: 'app_facade_method')]
    public function index(): Response
    {
        $result[] = $this->container->get(MediaFacadeService::class)->playMovie("pelicula.mp4", "subtitulos.srt");

        return $this->render('facade_method/index.html.twig', [
            'controller_name' => 'DecoratorMethodController',
            'result' => implode(" ", $result)
        ]);
    }
}
