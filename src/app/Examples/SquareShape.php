<?php

namespace App\Examples;

class SquareShape extends Shape
{

    public function getType(): string
    {
        return 'square';
    }

    public function showDetails(): string
    {
        return "I am a {$this->getType()} with color {$this->getColor()}";
    }
}