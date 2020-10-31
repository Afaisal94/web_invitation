<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['theme_name'=>'First Theme', 'view_name'=> 'first_theme', 'thumbnail'=>'first_theme.png'],
            ['theme_name'=>'Second Theme', 'view_name'=> 'second_theme', 'thumbnail'=>'second_theme.png'],
            ['theme_name'=>'Third Theme', 'view_name'=> 'third_theme', 'thumbnail'=>'third_theme.png'],
        ];
        
        DB::table('themes')->insert($data);
    }
}
