<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AuthorPolicy
{
    public function viewAny(User $user = null): bool
    {
        return true; // Public
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user = null, Author $author): bool
    {
        return true; // Public
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Authenticated users
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Author $author): bool
    {
        return true; // Authenticated users
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Author $author): bool
    {
        return true; // Authenticated users
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Author $author): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Author $author): bool
    {
        return false;
    }
}
