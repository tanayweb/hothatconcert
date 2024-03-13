<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'mobile' => '01737697395',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@gmail.com'),
            'sms_sent' => 0
        ]);
    }
}
