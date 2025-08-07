<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\UserService;

class UserController {
    protected UserService $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function index(Request $request, Response $response): Response {
        $users = $this->userService->getAllUsers();
        $response->getBody()->write(json_encode($users));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function show(Request $request, Response $response, array $args): Response {
        $user = $this->userService->getUserById((int)$args['id']);
        if (!$user) {
            $response->getBody()->write(json_encode(['error' => 'User not found']));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
        $response->getBody()->write($user->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    }
}
