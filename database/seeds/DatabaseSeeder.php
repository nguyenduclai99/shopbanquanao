<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'role' => 0,
            'password' => Hash::make('12345678')
        ]);
    }
}
