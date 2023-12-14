<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Admin',
            'email'      => 'admin@admin.com',
            'password'   => '$2y$10$BSY4HfGbW9w2PaMeVK2BSOjdktnE60e6IU4RJpE8DDZyNzL2z7PB6',
        ]);
    }
}
