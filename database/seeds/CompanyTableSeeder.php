<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'テスト1株式会社',
            'email' => 'company1@test.com',
            'password' => Hash::make('12345678'),
            'president' => 'テスト1社長',
            'foundation_date' => '2022-1-1'
        ]);
        DB::table('companies')->insert([
            'name' => 'テスト2株式会社',
            'email' => 'company2@test.com',
            'password' => Hash::make('12345678'),
            'president' => 'テスト2社長',
            'foundation_date' => '2022-1-2'
        ]);
    }
}
