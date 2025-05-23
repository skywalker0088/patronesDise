<?php

namespace App\Controller\PatronEstructural;

use App\Services\PatronEstructural\Decorator\ProblemOne\Cafe;
use App\Services\PatronEstructural\Decorator\ProblemOne\ConChocolate;
use App\Services\PatronEstructural\Decorator\ProblemOne\ConLeche;
use App\Services\PatronEstructural\Decorator\ProblemTwo\ConAmuletoDeProteccion;
use App\Services\PatronEstructural\Decorator\ProblemTwo\ConArmaduraPesada;
use App\Services\PatronEstructural\Decorator\ProblemTwo\Guerrero;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DecoratorController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            []
        );
    }


    #[Route('/decorator/method ', name: 'app_decorator_method')]
    public function index(): Response
    {
        $result = [];

        // $cafe = new Cafe();
        // $cafeConLeche = new ConLeche($cafe);
        // $cafeConLecheChocolate = new ConChocolate($cafeConLeche);

        // $result[] = "Bebida: " . $cafeConLecheChocolate->getDescripcion();
        // $result[] = number_format($cafeConLecheChocolate->getCosto(), 2);

        $guerrero = new Guerrero();
        $conArmaduraLegendaria = new ConArmaduraPesada($guerrero);
        $conAmuletoDeProteccion = new ConAmuletoDeProteccion($conArmaduraLegendaria);
        $result[] = $conAmuletoDeProteccion->getDescripcion();
        $result[] = $conAmuletoDeProteccion->getAtaque();
        $result[] = $conAmuletoDeProteccion->getDefensa();

        return $this->render('decorator_method/index.html.twig', [
            'controller_name' => 'DecoratorMethodController',
            'result' => implode(" ", $result)
        ]);
    }
}
