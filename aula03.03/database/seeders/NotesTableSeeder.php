<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notes')->insert(
            [
                [
                    'user_log'=>'1',
                    'titulo_notes'=>'testeee1',
                    'texto_notes'=>'aaa',
                    'created_at'=>date('Y-m-d H:i:s')
                ],
                [
                    'user_log'=>'2',
                    'titulo_notes'=>'testeee2',
                    'texto_notes'=>'bbb',
                    'created_at'=>date('Y-m-d H:i:s')
                ],
                [
                    'user_log'=>'3',
                    'titulo_notes'=>'testeee3',
                    'texto_notes'=>'ccc',
                    'created_at'=>date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
