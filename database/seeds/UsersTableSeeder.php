<?php

use Illuminate\Database\Seeder;
use Laraspace\User;

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
            'id' => '12334343',
            'email' => 'admin@laraspace.in',
            'imie' => 'Jan',
            'nazwisko' => 'Kowalski',
            'czy_administrator' => '1',
            'password' => bcrypt('admin@123')
        ]);

        User::create([
            'id' => '12444343',
            'email' => 'shane@laraspace.in',
            'imie' => 'Norwid',
            'nazwisko' => 'Malinowski',
            'czy_administrator' => '0',
            'password' => bcrypt('hank@123')
        ]);

        User::create([
            'id' => '12444113',
            'email' => 'adam@laraspace.in',
            'imie' => 'Janusz',
            'nazwisko' => 'Debeściak',
            'czy_administrator' => '0',
            'password' => bcrypt('jesse@123')
        ]);
    }
}
