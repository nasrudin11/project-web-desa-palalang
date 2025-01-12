<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Ahmad Nasrudin Jamil',
            'email' => 'ahmad@gmail.com',
            'password' => bcrypt('12345'),
            'no_tlp' => '',
            'gambar_profil' => '',
        ]);
    }
}
