<?php

namespace Database\Seeders;

use App\Models\adminside\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Admin::create([
            'user_type'         => 'admin',
            'adminname'         => 'superadmin',
            'adminemailaddress' => 'superadmin@superadmin.com',
            'password'    => Hash::make('12345678'),
            'active_status'     => 1,
            'created_at'        => NOW(),
            'updated_at'        => NOW(),
        ])->assignRole('admin');
    }
}
