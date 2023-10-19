<?php

namespace App\Policies;

use App\Models\User;

class userEditPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function editPolicy(User $user){
        return $user->id === $user->id;
    }
}
