<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            [
                'id' => '1',
                'title' => 'Коробка',
            ],
            [
                'id' => '2',
                'title' => 'Навигатор ТЦ',
            ],
        ]);
    }
}
