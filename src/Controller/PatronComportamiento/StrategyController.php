<?php

namespace App\Controller\PatronComportamiento;

use App\Services\PatronComportamiento\Strategy\ProblemOne\ExpressShipping;
use App\Services\PatronComportamiento\Strategy\ProblemOne\ShippingCalculator;
use App\Services\PatronComportamiento\Strategy\ProblemOne\StandardShipping;
use App\Services\PatronComportamiento\Strategy\ProblemOne\StorePickupShipping;
use App\Services\PatronComportamiento\Strategy\ProblemTwo\CreditCardPayment;
use App\Services\PatronComportamiento\Strategy\ProblemTwo\CryptoPayment;
use App\Services\PatronComportamiento\Strategy\ProblemTwo\PaymentProcessor;
use App\Services\PatronComportamiento\Strategy\ProblemTwo\PaypalPayment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StrategyController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            [
                ShippingCalculator::class => '?' . ShippingCalculator::class,
                PaymentProcessor::class => '?' . PaymentProcessor::class,
            ]
        );
    }

    #[Route('/strategy/method', name: 'app_strategy_method')]
    public function index(): Response
    {
        $return = [];

        $this->container->get(PaymentProcessor::class)->setStrategy(
            new CreditCardPayment()
        );
        $return[] = $this->container->get(PaymentProcessor::class)->process(10);

        $this->container->get(PaymentProcessor::class)->setStrategy(
            new CryptoPayment()
        );
        $return[] = $this->container->get(PaymentProcessor::class)->process(10);

        $this->container->get(PaymentProcessor::class)->setStrategy(
            new PaypalPayment()
        );
        $return[] = $this->container->get(PaymentProcessor::class)->process(10);

        // $this->container->get(ShippingCalculator::class)->setExpressShipping(
        //     new StandardShipping()
        // );
        // $return[] = $this->container->get(ShippingCalculator::class)->calculate(10, 20);

        // $this->container->get(ShippingCalculator::class)->setExpressShipping(
        //     new ExpressShipping()
        // );
        // $return[] = $this->container->get(ShippingCalculator::class)->calculate(10, 20);

        // $this->container->get(ShippingCalculator::class)->setExpressShipping(
        //     new StorePickupShipping()
        // );
        // $return[] = $this->container->get(ShippingCalculator::class)->calculate(10, 20);

        return $this->render('strategy_method/index.html.twig', [
            'controller_name' => 'StateController',
            'result' => implode(", ", $return)
        ]);
    }
}
