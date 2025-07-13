<?php

namespace App\Controller\PatronComportamiento;

use App\Services\PatronComportamiento\Observer\ProblemOne\Blog;
use App\Services\PatronComportamiento\Observer\ProblemOne\EmailSubscriber;
use App\Services\PatronComportamiento\Observer\ProblemOne\PushSubscriber;
use App\Services\PatronComportamiento\Observer\ProblemOne\SMSSubscriber;
use App\Services\PatronComportamiento\Observer\ProblemTwo\AlertaSubscriber;
use App\Services\PatronComportamiento\Observer\ProblemTwo\AuditoriaSubscriber;
use App\Services\PatronComportamiento\Observer\ProblemTwo\CuentaBancaria;
use App\Services\PatronComportamiento\Observer\ProblemTwo\GraficosSubscriber;
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

        // $blog = new Blog();

        // $blog->addSubscriber(new EmailSubscriber('juan@example.com'));
        // $blog->addSubscriber(new SMSSubscriber('123456789'));
        // $blog->addSubscriber(new PushSubscriber(42));

        // $return = $blog->publishArticle('El patrón Observer en PHP');

        $cuentaBancaria = new CuentaBancaria();

        $cuentaBancaria->addSubscriber(new AlertaSubscriber());
        $cuentaBancaria->addSubscriber(new GraficosSubscriber());
        $cuentaBancaria->addSubscriber(new AuditoriaSubscriber());

        $return = $cuentaBancaria->agregarSaldo(1000);
        $return = array_merge($return, $cuentaBancaria->extraerSaldo(1000));

        return $this->render('observer_method/index.html.twig', [
            'controller_name' => 'ObserverController',
            'result' => implode(", ", $return)
        ]);
    }
}
