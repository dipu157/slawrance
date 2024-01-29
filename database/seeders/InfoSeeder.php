<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('institute_infos')->insert([
            'name' => 'Your College Name',
            'phone' => '000 00 000',
            'email' => 'admin@slawrence.com',
            'created_at'=>'2023-01-27 11:31:21',
            'updated_at'=>'2023-01-27 11:31:43'
        ]);
    }
}
