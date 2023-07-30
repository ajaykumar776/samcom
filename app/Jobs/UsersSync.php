<?php

namespace App\Jobs;

use App\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UsersSync implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        // Fetch all users from the 'users' table
        $users = Users::all();

        // Loop through each user
        foreach ($users as $user) {
            // Find or create the corresponding record in 'user_datas' table based on email
            $userData = Users::firstOrNew(['email' => $user->email]);
            // Update the user data in 'user_datas' table
            $userData->name = $user->name;
            $userData->role = $user->role;
            $userData->address = $user->address;
            $userData->contact_no = $user->contact_no;
            $userData->save();
        }
    }
}
