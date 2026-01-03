<?php

namespace App\Services\PatronComportamiento\TemplateMethod\ProblemOne;

abstract class ReportGenerator
{
    abstract protected function fetchData(): array;
    abstract protected function formatData(array $data): string;
    abstract protected function export(string $content): string;

    final public function generate(): string
    {
        $return = [];
        $data = $this->fetchData();

        foreach ($data as $item) {
            $return[] = implode(",", $item);
        }

        $content = $this->formatData($data);
        $return[] = $content;

        $return[] = $this->beforeExport();   // Hook opcional
        $return[] = $this->export($content);
        $return[] = $this->afterExport();    // Hook opcional

        return implode(", ", $return);
    }

    // Hooks (opcionales)
    protected function beforeExport(): string
    {
        // vacío por defecto
        return "";
    }

    protected function afterExport(): string
    {
        // vacío por defecto
        return "";
    }
}
