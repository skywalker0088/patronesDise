<?php

namespace App\Controller\PatronComportamiento;

use App\Services\PatronComportamiento\Command\ProblemOne\GarageDoor;
use App\Services\PatronComportamiento\Command\ProblemOne\GarageDoorCloseCommand;
use App\Services\PatronComportamiento\Command\ProblemOne\GarageDoorOpenCommand;
use App\Services\PatronComportamiento\Command\ProblemOne\Light;
use App\Services\PatronComportamiento\Command\ProblemOne\LightOffCommand;
use App\Services\PatronComportamiento\Command\ProblemOne\LightOnCommand;
use App\Services\PatronComportamiento\Command\ProblemOne\RemoteControl;
use App\Services\PatronComportamiento\Command\ProblemOne\TV;
use App\Services\PatronComportamiento\Command\ProblemOne\TVOffCommand;
use App\Services\PatronComportamiento\Command\ProblemOne\TVOnCommand;
use App\Services\PatronComportamiento\Command\ProblemTwo\AddTextCommand;
use App\Services\PatronComportamiento\Command\ProblemTwo\DeleteTextCommand;
use App\Services\PatronComportamiento\Command\ProblemTwo\EditorInvoker;
use App\Services\PatronComportamiento\Command\ProblemTwo\TextEditor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CommandController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            []
        );
    }


    #[Route('/command/method', name: 'app_command_method')]
    public function index(): Response
    {
        $return = [];
        $editor = new TextEditor();
        $invoker = new EditorInvoker();

        $invoker->executeCommand(new AddTextCommand($editor, "Hola "));
        $invoker->executeCommand(new AddTextCommand($editor, "mundo"));
        $invoker->executeCommand(new DeleteTextCommand($editor, 5));

        $return[] = "Contenido actual: " . $editor->getContent() . "\n"; // "Hola "

        $invoker->undo(); // Revierte el delete: vuelve a "Hola mundo"
        $return[] = "Después de undo 1: " . $editor->getContent() . "\n";

        $invoker->undo(); // Revierte el "mundo"
        $return[] = "Después de undo 2: " . $editor->getContent() . "\n";

        $invoker->undo(); // Revierte el "Hola "
        $return[] = "Después de undo 3: " . $editor->getContent() . "\n";

        return $this->render('command_method/index.html.twig', [
            'controller_name' => 'CommandController',
            'result' => implode(", ", $return)
        ]);
    }
}
