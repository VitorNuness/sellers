<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;

class UserService implements UserServiceInterface
{
    public function __construct(
        protected UserRepositoryInterface $repository,
    ) {
        //
    }

    public function create(array $data): User
    {
        return $this->repository->create($data);
    }
}
