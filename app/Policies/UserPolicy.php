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

    //管理員権限だけユーザーを削除できる
    public function destroy(User $currentUser,User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }

    //自分は自分でフォローできない
    public function follow(User $currentUser,User $user)
    {
        return $currentUser->id !==$user->id;
    }
}
