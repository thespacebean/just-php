<?php

namespace App\Examples;

abstract class Shape
{

    protected string $type;
    public function __construct(protected string $color)
    {}

    public function getType(): string
    {
        return $this->type;
    }

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