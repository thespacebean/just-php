<?php

$app = require __DIR__ . '/bootstrap.php';
$twig = $app['twig'];

use App\Examples\SquareShape;

$shape = new SquareShape('blue');

$text = $shape->showDetails();

echo $twig->render('example.html.twig', ['text' => $text]);

echo "<p>This should show the database test:</p>";
include __DIR__ . '/database_test.php';
