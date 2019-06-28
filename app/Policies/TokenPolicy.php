<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TokenPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {

        if ($user->category->category === 'admin') {
            return true;
        }

        return null;
    }

    public function token(User $user)
    {

        return $user->category->category === 'moderator';

    }
}
