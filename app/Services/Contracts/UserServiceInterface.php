<?php

namespace App\Services\Contracts;

use App\Models\User;

interface UserServiceInterface
{
    /**
     * @param array $data
     * 
     * @return User
     */
    public function create(array $data): User;
}
