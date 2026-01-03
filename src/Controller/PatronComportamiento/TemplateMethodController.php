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
use App\Services\PatronComportamiento\TemplateMethod\ProblemOne\CsvReport;
use App\Services\PatronComportamiento\TemplateMethod\ProblemOne\PdfReport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TemplateMethodController extends AbstractController
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

    #[Route('/template-method/method', name: 'app_template_method_method')]
    public function index(): Response
    {
        $return = [];

        $report = new PdfReport();
        $return[] = $report->generate();

        $report = new CsvReport();
        $return[] = $report->generate();

        return $this->render('template_method_method/index.html.twig', [
            'controller_name' => 'TemplateMethodController',
            'result' => implode(", ", $return)
        ]);
    }
}
