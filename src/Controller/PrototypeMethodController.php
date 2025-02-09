<?php

namespace App\Controller;

use App\Services\Prototype\StudentBecadoDTO;
use App\Services\Prototype\StudentDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PrototypeMethodController extends AbstractController
{
    #[Route('/prototype/method', name: 'app_prototype_method')]
    public function index(): Response
    {
        $result = [];

        $studentDTO = new StudentDTO();
        $studentDTO->nombre = "rodrigo";
        $studentDTO->edad = 36;
        $studentDTO->curso = "curso1";

        $result[] = $studentDTO;

        $student2DTO = clone $studentDTO;
        $student2DTO->nombre = "patricia";
        $result[] = $student2DTO;

        $studentBecadoDTO = new StudentBecadoDTO();
        $studentBecadoDTO->nombre = "rodrigo";
        $studentBecadoDTO->edad = 36;
        $studentBecadoDTO->curso = "curso1";
        $studentBecadoDTO->porcentajeBeca = 123;
        $result[] = $studentBecadoDTO;

        $studentBecado2DTO = clone $studentBecadoDTO;
        $studentBecado2DTO->porcentajeBeca = 321;

        $result[] = $studentBecado2DTO;
        

        return $this->render('prototype_method/index.html.twig', [
            'controller_name' => 'PrototypeMethodController',
            'result' => $result
        ]);
    }
}
