<?php

namespace App\Services\PatronComportamiento\Memento\ProblemOne;

class History
{
    /** @var EditorMemento[] */
    private array $mementos = [];

    public function save(Editor $editor): void
    {
        $this->mementos[] = $editor->save();
    }

    public function undo(): ?EditorMemento
    {
        return array_pop($this->mementos) ?? null;
    }
}