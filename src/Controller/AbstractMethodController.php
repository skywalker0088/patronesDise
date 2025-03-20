<?php

namespace App\Controller;

use App\Services\AbstractMethod\CreateGUIService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AbstractMethodController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            [
                CreateGUIService::class => '?' . CreateGUIService::class,
            ]
        );
    }


    #[Route('/abstract-factory/method', name: 'app_abstract_method')]
    public function index(): Response
    {
        $theme = $this->container->get(CreateGUIService::class)->execute(CreateGUIService::THEME_DARK);     
        $button = $theme->createButton();
        $window = $theme->createWindow();
        $result = "button {$button->render()} window {$window->render()}";

        return $this->render('factory_method/index.html.twig', [
            'controller_name' => 'AbstractMethodController',
            'result' => $result
        ]);
    }
}
