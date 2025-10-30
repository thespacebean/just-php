<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Examples\SquareShape;

class ExampleTest extends TestCase
{
    public function testSquareShapeShowsDetails()
    {
        $shape = new SquareShape('red');
        $this->assertSame('I am a square with color red', $shape->showDetails());
    }
}


