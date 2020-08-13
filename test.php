<?php
require_once __DIR__ . '/vendor/autoload.php';

$di = require_once __DIR__ . '/di.php';

$manager = new \App\Container($di);

/** @var \App\Person\Man $man */
$man = $manager->get(\App\Person\Man::class, ['name' => 'Rodrigo']);

echo $man->getName() . "\n";

echo $man->getAnimal()->call() . "\n";

