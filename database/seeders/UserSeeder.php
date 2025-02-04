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
            'name' => 'Yassine',
            'email' => 'yy@yy.com',
            'password' => 'yyy',
        ]);
        User::create([
            'name' => 'ahmed',
            'email' => 'aa@aa.com',
            'password' => 'aaa',
        ]);
        User::create([
            'name' => 'Imad',
            'email' => 'ii@ii.com',
            'password' => 'iii',
        ]);
    }
}
