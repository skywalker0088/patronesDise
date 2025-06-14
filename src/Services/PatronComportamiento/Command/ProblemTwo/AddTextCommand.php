<?php

namespace App\Services\PatronComportamiento\Command\ProblemTwo;


class AddTextCommand implements Command
{
    private TextEditor $editor;
    private string $text;

    public function __construct(TextEditor $editor, string $text)
    {
        $this->editor = $editor;
        $this->text = $text;
    }

    public function execute(): void
    {
        $this->editor->addText($this->text);
    }

    public function undo(): void
    {
        $this->editor->deleteText(strlen($this->text));
    }
}
