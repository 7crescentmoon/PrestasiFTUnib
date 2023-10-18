<?php

namespace App\Policies;

use App\Models\User;

class adminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function accesAdminSuperadmin(User $user){

        return $user->role == "super admin" || $user->role == "admin";
    }
}
