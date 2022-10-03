<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 123,
            'name' => 'あああ',
            'email' => 'master@master.master',
            'password' => Hash::make('master'),
            'created_at' => null,
            'updated_at' => null,
        ]);
    }
}
