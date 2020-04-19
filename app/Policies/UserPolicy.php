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

    public function adminPanel($user)
    {
        return ( $user->isAdmin() || $user->isSuperAdmin() );
    }

    public function superAdmin($user)
    {
        return $user->isSuperAdmin();
    }
}
