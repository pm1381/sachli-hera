<?php

namespace App\Policies;

use App\Entities\Admin;
use App\Entities\User;

class UserPolicy
{
    // public function create(Admin $admin)
    // {
    // }

    public function update(Admin $admin, User $user)
    {
        if (($admin->getId() == $user->getAdmin()->getId() && $admin->getPassCall() ==1)|| $admin->getIsSuper() == 1) {
            return true;
        }
        return false;
    }

    // public function delete(Admin $admin, User $user)
    // {
    // }

    public function view(Admin $admin, User $user)
    {
        if ($admin->getId() == $user->getAdmin()->getId() || $admin->getIsSuper() == 1) {
            return true;
        }
        return false;
    }

}
