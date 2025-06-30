<?php

namespace App\Controller;

use App\Services\Result\CustomResultService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ResultMethodController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            [
                CustomResultService::class => '?' . CustomResultService::class,
            ]
        );
    }

    #[Route('/result/method', name: 'app_result_method')]
    public function index(): Response
    {
        $result = $this->container->get(CustomResultService::class)->execute(6, 0);
        $return = $result->fold(
            function ($opt) {
                if ($opt->isSome()) {
                    return $opt->unwrap();
                }
            },
            function ($err) {
                return $err->getMessage();
            }
        );

        return $this->render('result_method/index.html.twig', [
            'controller_name' => 'ResultMethodController',
            'result' => $return
        ]);
    }
}
