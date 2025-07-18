<?php

namespace App\Controller\PatronComportamiento;

use App\Services\PatronComportamiento\State\ProblemOne\VendingMachine;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StateController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            []
        );
    }

    #[Route('/state/method', name: 'app_state_method')]
    public function index(): Response
    {
        $return = [];

        $machine = new VendingMachine(2);

        $return[] = $machine->insertCoin();
        $return[] = $machine->selectBeverage();

        $return[] = $machine->insertCoin();
        $return[] = $machine->selectBeverage();

        $return[] = $machine->insertCoin(); // No debería permitir

        return $this->render('state_method/index.html.twig', [
            'controller_name' => 'StateController',
            'result' => implode(", ", $return)
        ]);
    }
}
