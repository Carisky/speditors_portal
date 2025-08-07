<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../bootstrap.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();
(require __DIR__ . '/../app/routes.php')($app);
$app->run();
