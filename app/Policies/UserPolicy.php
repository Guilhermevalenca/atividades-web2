<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function adm(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function librarian(User $user): bool
    {
        return $user->role === 'bibliotecario' || $user->role === 'admin';
    }

    public function client(User $user): bool
    {
        return $user->role === 'cliente' || $user->role === 'bibliotecario' || $user->role === 'admin';
    }
}
