<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportantNoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('important_notices')->insert([
            'title' => 'Important Notice here',
            'user_id' => '1',
            'created_at'=>'2023-01-27 11:31:21',
            'updated_at'=>'2023-01-27 11:31:43'
        ]);
    }
}
