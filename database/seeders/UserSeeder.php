<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'operator']);
        Role::create(['name' => 'moderator']);

        User::create([
            'email' => 'operator1@gmail.com',
            'role_id' => 2,
            'name' => 'operator1',
            'password' => bcrypt('operator1')
        ]);
    }
}
