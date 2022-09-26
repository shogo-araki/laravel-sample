<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ex.) DB Facade
        // for ($i = 1; $i <= 10; $i++) {
        //     $author = [
        //         'name' => '著者名' . $i,
        //         'kana' => 'チョシャメイ' . $i,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        //     DB::table('authors')->insert($author);
        // }

        // ex.) Faker
        $faker = Factory::create('ja_JP');
        for ($i = 1; $i <= 10; $i++) {
            $author = [
                'name' => $faker->name,
                'kana' => $faker->kanaName,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('authors')->insert($author);
        }
    }
}
