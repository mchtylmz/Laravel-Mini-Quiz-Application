<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\User::factory(10)->create();
       \App\Models\User::insert([
            'name' => 'Mücahit YILMAZ',
            'email' => 'mchtylmz149@gmail.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => '$2a$12$JIE.WgDUUAhbEIPvLYXymO0jA3ZJmw5BiEi0wwj79k9/fedzgx/ju', // 123456
            'remember_token' => Str::random(10),
        ]);
    }
}
