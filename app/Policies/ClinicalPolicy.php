<?php

namespace App\Policies;

use App\Clinical;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClinicalPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {

        if ($user->category->category === 'admin') {

            return true;

        }

        return null;
    }

    public function create(User $user)
    {

        $this->deny(__('directory/clinical.create_403'));

        return $user->category->category === 'moderator';

    }

    public function delete(User $user,Clinical $clinical)
    {

        $this->deny(__('directory/clinical.delete_403'));

        return $clinical->creator_id === $user->id;
    }
}
