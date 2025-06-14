<?php

namespace App\Services\PatronComportamiento\Command\ProblemTwo;

class TextEditor
{
    private string $content = '';

    public function addText(string $text): void
    {
        $this->content .= $text;
    }

    public function deleteText(int $length): string
    {
        $deleted = substr($this->content, -$length);
        $this->content = substr($this->content, 0, -$length);
        return $deleted;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
