<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@barobazar.com',
            'password' => bcrypt('11135157'),
            'created_at'=>'2023-01-27 11:31:21',
            'updated_at'=>'2023-01-27 11:31:43'
        ]);
    }
}
