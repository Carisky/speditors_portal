<?php
use Slim\App;
use App\Controllers\UserController;

return function (App $app) {
    $app->get('/users', [UserController::class, 'index']);
    $app->get('/users/{id}', [UserController::class, 'show']);
};
