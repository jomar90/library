<?php

namespace App\Policies;

use App\Models\Publisher;
use App\Models\User;

class PublisherPolicy
{
    /**
     * Create a new policy instance.
     */
    public function edit(User $user, Publisher $publisher): bool
    {
        return true;
    }
}
