<?php

namespace App\Policies;

use App\Models\Time;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can list times.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function index(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the time.
     *
     * @param \App\Models\User $user
     * @param \App\Time        $time
     *
     * @return mixed
     */
    public function view(User $user, Time $time)
    {
        return true;
    }

    /**
     * Determine whether the user can create times.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the time.
     *
     * @param \App\Models\User $user
     * @param \App\Time        $time
     *
     * @return mixed
     */
    public function update(User $user, Time $time)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the time.
     *
     * @param \App\Models\User $user
     * @param \App\Time        $time
     *
     * @return mixed
     */
    public function delete(User $user, Time $time)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the time.
     *
     * @param \App\Models\User $user
     * @param \App\Time        $time
     *
     * @return mixed
     */
    public function restore(User $user, Time $time)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the time.
     *
     * @param \App\Models\User $user
     * @param \App\Time        $time
     *
     * @return mixed
     */
    public function forceDelete(User $user, Time $time)
    {
        return false;
    }
}
