<?php

namespace App\Policies;

use App\Models\CTF;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CTFPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CTF $ctf): Response
    {
        return ($user->is_admin || !$ctf->status->isUpcoming())
            ? Response::allow()
            : Response::deny('You are not authorized to perform this operation.');
    }
}
