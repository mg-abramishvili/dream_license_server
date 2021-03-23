<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'dreamadmin',
            'email' => 'dream@admin',
            'password' => '$2y$10$875TzKjfPaT4xkl/TAZYXe8qaQeeyJ9ZyQbShJ5TWJguFxA71T8Au',
        ]);
    }
}
