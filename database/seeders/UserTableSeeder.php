<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'first_name' => 'AdminFirstName',
           'last_name' => 'AdminLastName',
           'role_id' => 1,
           'email' => 'admin@gmail.com',
           'password' => bcrypt('password')
        ]);
    }
}
