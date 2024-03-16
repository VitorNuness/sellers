<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        protected User $model,
    ) {
    }

    /**
     * @param array $data
     * 
     * @return User
     */
    public function create(array $data): User
    {
        $user = $this->model->create($data);
        return $user;
    }
}
