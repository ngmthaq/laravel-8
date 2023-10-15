<?php

namespace App\Repositories;

use App\Models\User;

class UserRepo extends BaseRepo implements UserRepoInterface
{
    public function getModel(): string
    {
        return User::class;
    }
}
