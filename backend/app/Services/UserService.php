<?php
namespace App\Services;

use App\Models\User;

class UserService {
    public function getAllUsers(): array {
        return User::all()->toArray();
    }

    public function getUserById(int $id): ?User {
        return User::find($id);
    }
}
