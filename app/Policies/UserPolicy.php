<?php

namespace App\Policies;

use App\Models\User;
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
    //用户修改
    public function update(User $currentUser, User $user)
    {
        
        return $currentUser->id === $user->id;
    }
    //用户删除
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
    //粉丝删除
   public function follow(User $currentUser, User $user)
    {
        return $currentUser->id !== $user->id;
    }
}
