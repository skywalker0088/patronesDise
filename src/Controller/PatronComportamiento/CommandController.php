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
        $remote = new RemoteControl();

        $livingRoomLight = new Light("Living Room");
        $tv = new TV("Bedroom");
        $garageDoor = new GarageDoor();

        // Asignamos comandos a los botones
        $remote->setCommand(0, new LightOnCommand($livingRoomLight), new LightOffCommand($livingRoomLight));
        $remote->setCommand(1, new TVOnCommand($tv), new TVOffCommand($tv));
        $remote->setCommand(2, new GarageDoorOpenCommand($garageDoor), new GarageDoorCloseCommand($garageDoor));

        // Simulamos el uso
        $return[] = $remote->pressOnButton(0);   // Enciende la luz
        $return[] = $remote->pressOffButton(0);  // Apaga la luz
        $return[] = $remote->pressUndo();        // Deshace la acción (enciende la luz)

        $return[] = $remote->pressOnButton(1);   // Enciende la TV
        $return[] = $remote->pressOffButton(1);  // Apaga la TV

        $return[] = $remote->pressOnButton(2);   // Abre la puerta del garage
        $return[] = $remote->pressUndo();        // Deshace (cierra la puerta)

        return $this->render('command_method/index.html.twig', [
            'controller_name' => 'CommandController',
            'result' => implode(", ", $return)
        ]);
    }
}
