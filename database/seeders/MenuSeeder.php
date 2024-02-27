<?php

namespace Database\Seeders;

use App\Models\Menu\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('menus')->delete();

        $menus = [
            [
                'name' => 'Home',
                'position' => 1,
                'user_id' => 1,
                'created_at'=>'2023-01-27 11:31:21',
                'updated_at'=>'2023-01-27 11:31:43'
            ],
            [
                'name' => 'Notice',
                'position' => 3,
                'user_id' => 1,
                'created_at'=>'2023-01-27 11:31:21',
                'updated_at'=>'2023-01-27 11:31:43'
            ],
        ];

        Menu::insert($menus);
    }
}
