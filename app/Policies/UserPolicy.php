<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine if the given user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->is_admin; // Only allow admins to view any users
    }

    /**
     * Determine if the given user can view the model.
     */
    public function view(User $user, User $model)
    {
        return $user->is_admin; // Only allow admins to view a specific user
    }

    /**
     * Determine if the given user can create models.
     */
    public function create(User $user)
    {
        return $user->is_admin; // Only allow admins to create users
    }

    /**
     * Determine if the given user can update the model.
     */
    public function update(User $user, User $model)
    {
        return $user->is_admin; // Only allow admins to update users
    }

    /**
     * Determine if the given user can delete the model.
     */
    public function delete(User $user, User $model)
    {
        return $user->is_admin; // Only allow admins to delete users
    }

    // Add other methods if necessary, e.g., restore, forceDelete, etc.
}
