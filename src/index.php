<?php

use App\Examples\SquareShape;

require __DIR__ . '/vendor/autoload.php';

$shape = new SquareShape('blue');

$text = $shape->showDetails();


echo $text;