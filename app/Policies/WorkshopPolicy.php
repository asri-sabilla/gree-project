<?php

namespace App\Policies;
use App\Models\User;
use App\Models\Workshop;
use illuminate\Auth\Access\HandlesAuthorization;

class WorkshopPolicy
{
    public function create(User $user)
    {
        // # Hanya user 'admin@gmail.com' saja yang bisa menjalankan proses create
        return $user->email === 'admin@gmail.com';
        // # User 'admin@gmail.com' dan 'support@gmail.com' bisa menjalankan proses create
        // return ($user->email === 'admin@gmail.com')
        // OR ($user->email === 'support@gmail.com');
        // # User 'admin@gmail.com' dan 'support@gmail.com' bisa menjalankan proses create
        return in_array($user->email,[
            'admin@gmail.com',
            'support@gmail.com',
        ]);
    }
    public function delete(User $user, Workshop $workshop)
    {
        return in_array($user->email,[
        'admin@gmail.com'
        ]);
    }

    public function view(User $user, Workshop $workshop)
    {
        return in_array($user->email,[
        'admin@gmail.com'
        ]);
    }
}