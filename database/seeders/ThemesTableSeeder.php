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
        
        \App\Models\Theme::insert([
            ['theme_name'=>'First Theme', 'view_name'=> 'first', 'thumbnail'=>'first_theme.png'],
            ['theme_name'=>'Second Theme', 'view_name'=> 'second', 'thumbnail'=>'second_theme.png'],
            ['theme_name'=>'Third Theme', 'view_name'=> 'third', 'thumbnail'=>'third_theme.png'],
        ]);
    }
}
