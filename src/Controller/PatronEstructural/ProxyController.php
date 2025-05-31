<?php

namespace App\Controller\PatronEstructural;

use App\Services\PatronEstructural\Proxy\DocumentoProxy;
use App\Services\PatronEstructural\Proxy\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProxyController extends AbstractController
{
    #[Route('/proxy/method ', name: 'app_proxy_method')]
    public function index(): Response
    {
        $result = [];
        $usuario1 = new Usuario("Patricia", true);
        $usuario2 = new Usuario("Rodrigo", false);

        $proxy1 = new DocumentoProxy($usuario1);
        $proxy2 = new DocumentoProxy($usuario2);

        $result[] = $proxy1->mostrarContenido();
        $result[] = $proxy2->mostrarContenido();

        return $this->render('proxy_method/index.html.twig', [
            'controller_name' => 'ProxyController',
            'result' => implode(" ", $result)
        ]);
    }
}
