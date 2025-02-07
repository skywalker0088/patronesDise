<?php

namespace App\Controller;

use App\Services\FactoryMethod\NotificationFactoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FactoryMethodController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            [
                NotificationFactoryService::class => '?' . NotificationFactoryService::class,
            ]
        );
    }


    #[Route('/factory/method', name: 'app_factory_method')]
    public function index(): Response
    {
        $notification = $this->container->get(NotificationFactoryService::class)->createNotification();
        $message = "hola esto es una prueba";
        $notification->send($message);

        return $this->render('factory_method/index.html.twig', [
            'controller_name' => 'FactoryMethodController',
            'result' => $notification->send($message)
        ]);
    }
}
