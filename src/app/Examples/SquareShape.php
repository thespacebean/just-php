<?php

namespace App\Examples;

class SquareShape extends Shape
{

    protected string $type = 'square';

    public function showDetails(): string
    {
        return "I am a {$this->getType()} with color {$this->getColor()}";
    }
}