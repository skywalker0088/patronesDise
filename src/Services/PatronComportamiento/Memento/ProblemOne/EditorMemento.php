<?php

namespace App\Services\PatronComportamiento\Memento\ProblemOne;

class EditorMemento
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
