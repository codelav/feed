<?php

namespace App\Repository;

use App\Models\User;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories
 */
interface UserRepositoryInterface
{
    public function create(array $attributes): User;
}
