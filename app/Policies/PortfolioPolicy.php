<?php

namespace App\Policies;

use App\User;
use App\Potfolio;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any potfolios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the potfolio.
     *
     * @param  \App\User  $user
     * @param  \App\Potfolio  $potfolio
     * @return mixed
     */
    public function view(User $user, Potfolio $potfolio)
    {
        //
    }

    /**
     * Determine whether the user can create potfolios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {


    }

    /**
     * Determine whether the user can update the potfolio.
     *
     * @param  \App\User  $user
     * @param  \App\Potfolio  $potfolio
     * @return mixed
     */
    public function update(User $user, Potfolio $potfolio)
    {
    }

    /**
     * Determine whether the user can delete the potfolio.
     *
     * @param  \App\User  $user
     * @param  \App\Potfolio  $potfolio
     * @return mixed
     */
    public function delete(User $user, Potfolio $potfolio)
    {
        return $user->id === $potfolio->user_id;

    }

    /**
     * Determine whether the user can restore the potfolio.
     *
     * @param  \App\User  $user
     * @param  \App\Potfolio  $potfolio
     * @return mixed
     */
    public function restore(User $user, Potfolio $potfolio)
    {
        return $user->id === $potfolio->user_id;

    }

    /**
     * Determine whether the user can permanently delete the potfolio.
     *
     * @param  \App\User  $user
     * @param  \App\Potfolio  $potfolio
     * @return mixed
     */
    public function forceDelete(User $user, Potfolio $potfolio)
    {
        return $user->id === $potfolio->user_id;

    }

    public function store(User $user,$user_id){
        return $user->id === $user_id;
    }
}
