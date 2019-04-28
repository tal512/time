<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can list projects.
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
     * Determine whether the user can view the project.
     *
     * @param \App\Models\User $user
     * @param \App\Project     $project
     *
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        return true;
    }

    /**
     * Determine whether the user can create projects.
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
     * Determine whether the user can update the project.
     *
     * @param \App\Models\User $user
     * @param \App\Project     $project
     *
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param \App\Models\User $user
     * @param \App\Project     $project
     *
     * @return mixed
     */
    public function delete(User $user, Project $project)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the project.
     *
     * @param \App\Models\User $user
     * @param \App\Project     $project
     *
     * @return mixed
     */
    public function restore(User $user, Project $project)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the project.
     *
     * @param \App\Models\User $user
     * @param \App\Project     $project
     *
     * @return mixed
     */
    public function forceDelete(User $user, Project $project)
    {
        return false;
    }
}
