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
        // DB::table('menus')->insert([
        //     'name' => 'About Us',
        //     'slug' => 'about_us',
        //     'created_at'=>'2023-01-27 11:31:21',
        //     'updated_at'=>'2023-01-27 11:31:43'
        // ]);


        DB::table('menus')->delete();

        $menus = [
            [
                'name' => 'About Us', 
                'slug' => 'about_us', 
                'user_id' => 1,
                'created_at'=>'2023-01-27 11:31:21', 
                'updated_at'=>'2023-01-27 11:31:43'
            ],
            [
                'name' => 'Academic', 
                'slug' => 'academic', 
                'user_id' => 1,
                'created_at'=>'2023-01-27 11:31:21', 
                'updated_at'=>'2023-01-27 11:31:43'
            ],
        ];
    
        Menu::insert($menus);
    }
}
