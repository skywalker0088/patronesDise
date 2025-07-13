<?php

namespace App\Controller\PatronComportamiento;

use App\Services\PatronComportamiento\Memento\ProblemOne\Editor;
use App\Services\PatronComportamiento\Memento\ProblemOne\History;
use App\Services\PatronComportamiento\Memento\ProblemTwo\GameHistory;
use App\Services\PatronComportamiento\Memento\ProblemTwo\Player;
use App\Services\PatronComportamiento\Observer\ProblemOne\Blog;
use App\Services\PatronComportamiento\Observer\ProblemOne\EmailSubscriber;
use App\Services\PatronComportamiento\Observer\ProblemOne\PushSubscriber;
use App\Services\PatronComportamiento\Observer\ProblemOne\SMSSubscriber;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ObserverController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            []
        );
    }

    #[Route('/observer/method', name: 'app_observer_method')]
    public function index(): Response
    {
        $return = [];

        $blog = new Blog();

        $blog->addSubscriber(new EmailSubscriber('juan@example.com'));
        $blog->addSubscriber(new SMSSubscriber('123456789'));
        $blog->addSubscriber(new PushSubscriber(42));

        $return = $blog->publishArticle('El patrón Observer en PHP');

        return $this->render('observer_method/index.html.twig', [
            'controller_name' => 'ObserverController',
            'result' => implode(", ", $return)
        ]);
    }
}
