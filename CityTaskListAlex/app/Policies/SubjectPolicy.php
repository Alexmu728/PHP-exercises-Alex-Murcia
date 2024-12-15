<?php

namespace App\Policies;

use App\Models\Subject;
use App\Models\User;

class SubjectPolicy
{
  
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, Subject $subject)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Subject $subject)
    {
        return $user->isAdmin();
    }

}
