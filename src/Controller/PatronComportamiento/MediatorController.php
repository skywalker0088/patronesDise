<?php

namespace App\Controller\PatronComportamiento;

use App\Services\PatronComportamiento\Mediator\ProblemOne\ChatRoom;
use App\Services\PatronComportamiento\Mediator\ProblemOne\Usuario;
use App\Services\PatronComportamiento\Mediator\ProblemTwo\Avion;
use App\Services\PatronComportamiento\Mediator\ProblemTwo\TorreDeControl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MediatorController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            []
        );
    }

    #[Route('/mediator/method', name: 'app_mediator_method')]
    public function index(): Response
    {
        $return = [];

        // $chatRoom = new ChatRoom();

        // $juan = new Usuario("Juan", $chatRoom);
        // $maria = new Usuario("Maria", $chatRoom);
        // $pedro = new Usuario("Pedro", $chatRoom);

        // $returnChat = $juan->send("Hola a todos!");
        // $return = array_merge($return, $returnChat);

        // $returnChat = $maria->send("¡Hola Juan!");
        // $return = array_merge($return, $returnChat);

        $torre = new TorreDeControl();

        $a1 = new Avion("A1", $torre);
        $a2 = new Avion("A2", $torre);
        $a3 = new Avion("A3", $torre);

        $return[] = $a1->solicitarAterrizaje();
        $return[] = $a2->solicitarAterrizaje();
        $return[] = $a3->solicitarAterrizaje();

        $return[] = $a1->salirDePista(); // Ahora debería aterrizar A2
        $return[] = $a2->salirDePista(); // Ahora debería aterrizar A3
        
        return $this->render('mediator_method/index.html.twig', [
            'controller_name' => 'MediatorController',
            'result' => implode(", ", $return)
        ]);
    }
}
