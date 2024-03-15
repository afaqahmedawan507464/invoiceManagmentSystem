<?php

namespace App\Console\Commands;

use App\Models\adminside\Admin;
use App\Models\employeeside\employee;
use Illuminate\Console\Command;

class UpdateUserStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update_status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        Admin::query()->update(['active_status' => 0]);
        employee::query()->update(['active_status' => 0]);
        $this->info('User Statuses Updated Successfully.');
    }
}
