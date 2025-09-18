<?php

namespace App\Examples;

abstract class Shape
{
    public function __construct(protected string $color)
    {}

    abstract public function getType(): string;

    abstract public function showDetails(): string;

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }
}