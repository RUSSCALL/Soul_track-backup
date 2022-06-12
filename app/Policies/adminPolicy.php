<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class adminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    //general admin rolecheck
    public function adminRoleCheck(User $user)
    {  
        return  $user->roles->role_name == 'super_Admin' || 'Admin';        
    }

    public function SuperAdminCheck(User $user)
    {  
        return  $user->roles->role_name == 'super_Admin';        
    }

    public function usherRoleCheck(User $user){
        return $user->roles->role_name == 'Usher';
    }

    
}
