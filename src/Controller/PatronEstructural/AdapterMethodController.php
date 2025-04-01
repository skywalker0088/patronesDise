<?php

namespace App\Controller\PatronEstructural;

use App\Services\PatronEstructural\Adapter\NotificationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdapterMethodController extends AbstractController
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


    #[Route('/adapter/method', name: 'app_adapter_method')]
    public function index(): Response
    {
        $result = $this->container->get(NotificationService::class)->execute("hola mundo");     

        return $this->render('adapter_method/index.html.twig', [
            'controller_name' => 'AdapterMethodController',
            'result' => $result
        ]);
    }
}
