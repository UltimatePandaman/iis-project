<?php

namespace App\Policies;

use App\Models\Presentation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PresentationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Presentation $presentation)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Presentation $presentation)
    {
        if($user->id == $presentation->conference()->first()->user_id or $user->isadmin == 1){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Presentation $presentation)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Presentation $presentation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Presentation  $presentation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Presentation $presentation)
    {
        //
    }
}
