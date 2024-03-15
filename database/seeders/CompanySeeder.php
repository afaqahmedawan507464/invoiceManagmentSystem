<?php

namespace Database\Seeders;

use App\Models\adminside\company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        company::create([
            'company_name'            => 'demo company',
            'company_logo'            => 'abc',
            'company_emailaddress'    => 'abc@gmail.com',
            'company_contactnumber'   => 1235687,
            'company_ownername'       => 'abcdefghijklmnop',
            'company_ntnnumber'       => '123456abc',
            'company_address'         => 'abcdefghijklmnop',
            'company_workDetails'     => 'abcdefghijklmnop',
            'created_at'              => NOW(),
            'updated_at'              => NOW(),
        ]);
    }
}
