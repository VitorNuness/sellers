<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * Store a user in data base
     * @param array $data
     * 
     * @return User
     */
    public function create(array $data): User;
}
