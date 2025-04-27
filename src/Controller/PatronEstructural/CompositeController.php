<?php

namespace App\Controller\PatronEstructural;

use App\Services\PatronEstructural\Bridge\ProblemTwo\DeviceAdvanced;
use App\Services\PatronEstructural\Bridge\ProblemTwo\DeviceStandard;
use App\Services\PatronEstructural\Composite\ProblemOne\Archivo;
use App\Services\PatronEstructural\Composite\ProblemOne\Carpeta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CompositeController extends AbstractController
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


    #[Route('/composite/method', name: 'app_composite_method')]
    public function index(): Response
    {
        $result = [];

        $raiz = new Carpeta("Documentos");
        $raiz->agregar(new Archivo("CV.pdf", 100));
        $raiz->agregar(new Archivo("contrato.docx", 80));

        $fotos = new Carpeta("Fotos");
        $fotos->agregar(new Archivo("vacaciones.jpg", 200));
        $fotos->agregar(new Archivo("familia.png", 150));

        $raiz->agregar($fotos);

        $result[] = $raiz->imprimirEstructura();

        return $this->render('composite_method/index.html.twig', [
            'controller_name' => 'AdapterMethodController',
            'result' => implode(" ", $result)
        ]);
    }
}
