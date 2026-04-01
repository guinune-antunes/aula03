<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'user_log'=>'teste1@teste.com',
                    'pw_log'=>bcrypt('123456'),
                    'created_at'=>date('Y-m-d H:i:s')
                ],
                [
                    'user_log'=>'teste3@teste.com',
                    'pw_log'=>bcrypt('123456'),
                    'created_at'=>date('Y-m-d H:i:s')
                ],
                [
                    'user_log'=>'teste2@teste.com',
                    'pw_log'=>bcrypt('123456'),
                    'created_at'=>date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
