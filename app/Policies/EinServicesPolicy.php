<?php

namespace App\Policies;

use App\Models\Ein_Services;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EinServicesPolicy
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
     * @param  \App\Models\Ein_Services  $einServices
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Ein_Services $einServices)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ein_Services  $einServices
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Ein_Services $einServices)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ein_Services  $einServices
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Ein_Services $einServices)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ein_Services  $einServices
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Ein_Services $einServices)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ein_Services  $einServices
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Ein_Services $einServices)
    {
        //
    }
}
