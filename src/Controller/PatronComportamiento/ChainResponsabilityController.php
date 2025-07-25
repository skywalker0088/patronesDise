<?php

namespace App\Controller\PatronComportamiento;

use App\Services\PatronComportamiento\ChainResponsability\ProblemOne\SoporteNivel1;
use App\Services\PatronComportamiento\ProblemOne\ChainResponsability\SoporteNivel2;
use App\Services\PatronComportamiento\ProblemOne\ChainResponsability\SoporteNivel3;
use App\Services\PatronComportamiento\ProblemTwo\ChainResponsability\FiltrarLenguaje;
use App\Services\PatronComportamiento\ProblemTwo\ChainResponsability\FiltrarLongitud;
use App\Services\PatronComportamiento\ProblemTwo\ChainResponsability\FiltrarSpam;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ChainResponsabilityController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            []
        );
    }


    #[Route('/chain-responsability/method', name: 'app_chainresponsability_method')]
    public function index(): Response
    {
        $return = [];

        // $nivel1 = new SoporteNivel1();
        // $nivel2 = new SoporteNivel2();
        // $nivel3 = new SoporteNivel3();

        // // Crear la cadena de responsabilidad
        // $nivel1->setSiguiente($nivel2);
        // $nivel2->setSiguiente($nivel3);

        // $solicitudes = [
        //     'recuperar contraseña',
        //     'problema de red',
        //     'error de hardware',
        //     'problema desconocido'
        // ];

        // foreach ($solicitudes as $solicitud) {
        //     $return[] = "\nProcesando solicitud: '$solicitud'\n";
        //     $return[] = $nivel1->manejar($solicitud);
        // }   

        $filtroSpam = new FiltrarSpam();
        $filtroLogintud = new FiltrarLongitud();
        $filtroLenguaje = new FiltrarLenguaje();

        $filtroSpam->setSiguiente($filtroLogintud);
        $filtroLogintud->setSiguiente($filtroLenguaje);

        $textos = [
            "que boludo la persona",
            "htps://spam asdas",
            "texto de muscha longitud"
        ];

        foreach ($textos as $texto) {
            $return[] = "\nProcesando texto: '$texto'\n";
            $return[] = $filtroSpam->filtrar($texto);
        }

        return $this->render('chainresponsability_method/index.html.twig', [
            'controller_name' => 'ChainResponsabilityController',
            'result' => implode(", ", $return)
        ]);
    }
}
