<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'admin',
            'email'=>'admin@gmail.com',
            'password'=> bcrypt('admin123'),
        ]);

        User::create([
            'name'=>'pemilik bengkel',
            'email'=>'nofaldi@gmail.com',
            'password'=> bcrypt('nofaldi123'),
        ]);

        User::create([
            'name'=>'pelanggan',
            'email'=>'novira@gmail.com',
            'password'=> bcrypt('novira123'),
        ]);

    }
}
