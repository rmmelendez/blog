<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(User $authUser, User $user)
    {
        //Estamos comparando el id del usuario autenticado (usuario en uso) con el id del usuario de la tabla
        return $authUser->id === $user->id;

    }
}
