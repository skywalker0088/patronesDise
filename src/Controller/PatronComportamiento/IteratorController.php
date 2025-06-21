<?php

namespace App\Controller\PatronComportamiento;

use App\Services\PatronComportamiento\Iterator\ProblemOne\Book;
use App\Services\PatronComportamiento\Iterator\ProblemOne\Library;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IteratorController extends AbstractController
{
    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            []
        );
    }


    #[Route('/iterator/method', name: 'app_iterator_method')]
    public function index(): Response
    {
        $return = [];

        $library = new Library();
        $library->addBook(new Book("1984", "George Orwell"));
        $library->addBook(new Book("Fahrenheit 451", "Ray Bradbury"));
        $library->addBook(new Book("Animal Farm", "George Orwell"));

        $return[] = "📚 Todos los libros:\n";
        foreach ($library as $book) {
            $return[] = "- {$book->title} ({$book->author})\n";
        }


        $return[] = "\n🔍 Libros de George Orwell:\n";
        $orwellBooks = $library->findByAuthor("George Orwell");
        foreach ($orwellBooks as $book) {
            $return[] = "- {$book->title}\n";
        }

        return $this->render('iterator_method/index.html.twig', [
            'controller_name' => 'IteratorController',
            'result' => implode(", ", $return)
        ]);
    }
}
