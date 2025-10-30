<?php

use App\Examples\SquareShape;

require __DIR__ . '/vendor/autoload.php';

$shape = new SquareShape('blue');

$text = $shape->showDetails();

echo $text;

echo "<p>This should show the database test:</p>";
echo "<br /><br />";
include __DIR__ . '/database_test.php';
echo "<br>";
