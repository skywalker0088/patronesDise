<?php

namespace App\Services\PatronComportamiento\Command\ProblemTwo;


class DeleteTextCommand implements Command
{
    private TextEditor $editor;
    private int $length;
    private string $deletedText = '';

    public function __construct(TextEditor $editor, int $length)
    {
        $this->editor = $editor;
        $this->length = $length;
    }

    public function execute(): void
    {
        $this->deletedText = $this->editor->deleteText($this->length);
    }

    public function undo(): void
    {
        $this->editor->addText($this->deletedText);
    }
}
