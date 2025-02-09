<?php

namespace App\Services\Prototype;

class StudentDTO
{
    public string $nombre;
    public int $edad;
    public string $curso;

    public function __clone() {
    }
}
