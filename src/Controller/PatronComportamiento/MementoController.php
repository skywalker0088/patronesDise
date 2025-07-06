<?php

namespace App\Controller\PatronComportamiento;

use App\Services\PatronComportamiento\Memento\ProblemOne\Editor;
use App\Services\PatronComportamiento\Memento\ProblemOne\History;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MementoController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            []
        );
    }

    #[Route('/memento/method', name: 'app_memento_method')]
    public function index(): Response
    {
        $return = [];

        $editor = new Editor();
        $history = new History();

        $editor->append("Hola");
        $history->save($editor);

        $editor->append(" mundo!");
        $history->save($editor);

        $editor->append(" Esto no me gusta...");
        $return[] = $editor->getContent() . PHP_EOL; // Hola mundo! Esto no me gusta...

        $editor->restore($history->undo());
        $return[] = $editor->getContent() . PHP_EOL; // Hola mundo!

        $editor->restore($history->undo());
        $return[] = $editor->getContent() . PHP_EOL; // Hola

        return $this->render('memento_method/index.html.twig', [
            'controller_name' => 'MediatorController',
            'result' => implode(", ", $return)
        ]);
    }
}
