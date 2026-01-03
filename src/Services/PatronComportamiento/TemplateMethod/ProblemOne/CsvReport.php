<?php

namespace App\Services\PatronComportamiento\TemplateMethod\ProblemOne;

class CsvReport extends ReportGenerator
{
    protected function fetchData(): array
    {
        return [
            ['name' => 'Rodrigo', 'score' => 9],
            ['name' => 'Ana', 'score' => 8],
        ];
    }

    protected function formatData(array $data): string
    {
        $output = "name,score\n";
        foreach ($data as $row) {
            $output .= "{$row['name']},{$row['score']}\n";
        }

        return $output;
    }

    protected function export(string $content): string
    {
        return "Guardando archivo CSV...$content";
    }
}
