<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        DB::table('setting')->insert([
            [
                'variabel' => 'min_sks',
                'value' => 8
            ],
        ]);
        DB::table('setting')->insert([
            [
                'variabel' => 'hargapersks',
                'value' => 10000
            ],
        ]);
    }
}
