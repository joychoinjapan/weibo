<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    //ユーザーは自分の情報のみ操作できる
    public function update(User $currentUser,User $user)
    {
        return $currentUser->id === $user->id;

    }
}
