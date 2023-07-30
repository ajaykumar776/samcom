<?php

use Illuminate\Console\Command;
use App\Jobs\UsersSync;

class UpdateUsers extends Command
{
    protected $signature = 'sync:users';
    protected $description = 'Sync user data into user_datas table';

    public function handle()
    {
        $this->info('Synchronizing user data...');
        dispatch(new UsersSync());
        $this->info('User data synchronization complete!');
    }
}
