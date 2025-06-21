<?php

namespace App\Services\PatronComportamiento\Iterator\ProblemOne;

use IteratorAggregate;
use Traversable;

class Library implements IteratorAggregate
{
    private array $books = [];

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function getIterator(): Traversable
    {
        return new LibraryIterator($this->books);
    }

    // Bonus: Buscar libros por autor
    public function findByAuthor(string $author): array
    {
        return array_filter($this->books, fn(Book $book) => $book->author === $author);
    }
}
