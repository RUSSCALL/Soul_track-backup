<?php

namespace App\Policies;

use App\Models\User;
use App\Models\collosal;
use Illuminate\Auth\Access\HandlesAuthorization;

class collosalPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\collosal  $collosal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, collosal $collosal)
    {
         return $collosal->winner_id == $user->id;
        
    }
//     public function touch(User $user, collosal $collosal)
//     {
//          return  $user->role_id == 1;
        
//     }
    

}
