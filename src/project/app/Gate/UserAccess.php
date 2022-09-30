<?php

namespace App\Gate;

use App\Models\User;

final class UserAccess
{
    public function __invoke(User $user, string $id): bool
    {
        return intval($user->getAuthIdentifier() === intval($id));
    }
}
