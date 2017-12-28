<?php

use Illuminate\Database\Seeder;
use Laraspace\User;
use Webpatser\Uuid\Uuid;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => Uuid::generate()->string,
            'location_id' => Uuid::generate()->string,
            'wallet_id' => Uuid::generate()->string,
            'avatar_id' => Uuid::generate()->string,
            'email' => 'admin@laraspace.in',
            'first_name' => 'Jan',
            'last_name' => 'Kowalski',
            'phone_number' => '676 837 332',
            'status' => 'active',
            'password' => bcrypt('admin@123')
        ]);
    }
}
