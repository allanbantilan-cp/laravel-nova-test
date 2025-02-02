<?php

namespace App\Observers;

use App\Models\User;
use Laravel\Nova\Notifications\NovaNotification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {

        $this->getNovaNotification($user, 'New User :', 'success');
    }


    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        $this->getNovaNotification($user, 'Updated User :', 'info');
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $this->getNovaNotification($user, 'Deleted User :', 'error');
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        $this->getNovaNotification($user, 'Restore User :', 'success');
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        $this->getNovaNotification($user,  'Force Deleted User :', 'error');
    }

    private function getNovaNotification($user, $message, $type)
    {
        foreach (User::all() as $u) {
            $u->notify(
                NovaNotification::make()
                    ->message($message . ' ' . $user->name)
                    ->icon('user')
                    ->type($type)
            );
        }
    }
}
