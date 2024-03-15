<?php

namespace Database\Seeders;

use App\Models\employeeside\employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        employee::create([
            'user_type'            => 'computer operator',
            'employeename'         => 'demo employee',
            'employeeemailaddress' => 'employee@employee.com',
            'password'             => Hash::make('12345678'),
            'active_status'        => 1,
            'created_at'           => NOW(),
            'updated_at'           => NOW(),
        ]);
    }
}
