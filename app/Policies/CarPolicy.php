<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param \App\Models\User $user
     * @return void|bool
     */
    public function before(User $user)
    {
        if ($user->role == 'admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Car $car
     * @return bool
     */
    public function view(User $user, Car $car): bool
    {
        return $user->id === $car->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Car $car
     * @return bool
     */
    public function update(User $user, Car $car): bool
    {
        return $user->id === $car->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Car $car
     * @return bool
     */
    public function delete(User $user, Car $car): bool
    {
        return $user->id === $car->user_id;
    }
}
