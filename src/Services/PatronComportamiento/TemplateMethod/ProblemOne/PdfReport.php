<?php

namespace App\Services\PatronComportamiento\TemplateMethod\ProblemOne;

class PdfReport extends ReportGenerator
{
    protected function fetchData(): array
    {
        return [
            ['name' => 'Rodrigo', 'score' => 9],
            ['name' => 'chino', 'score' => 8],
        ];
    }

    protected function formatData(array $data): string
    {
        $output = "REPORTE PDF\n\n";
        foreach ($data as $row) {
            $output .= "{$row['name']} - {$row['score']}\n";
        }

        return $output;
    }

    protected function export(string $content): string
    {
        return "Exportando PDF... $content";
    }

    protected function beforeExport(): string
    {
        return "Inicializando librería PDF...\n";
    }
}
