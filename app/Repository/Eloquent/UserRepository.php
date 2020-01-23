<?php

namespace App\Repository\Eloquent;

use App\Repository\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    /* @var User */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): User
    {
        return $this->model->create([
            'email' => $attributes['email'],
            'password' => Hash::make($attributes['password']),
        ]);
    }
}
