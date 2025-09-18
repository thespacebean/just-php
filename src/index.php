<?php

use App\Examples\SquareShape;

require __DIR__ . '/vendor/autoload.php';

$shape = new SquareShape('red');

$text = $shape->showDetails();


echo $text;