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
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    //我们使用了下面这行代码来指明，只有当前用户拥有管理员权限且删除的用户不是自己时才显示链接
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
