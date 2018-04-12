<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=CategoriesTableSeeder
     *
     * @return void
     */
    public function run()
    {
        
        $title = ['Adventure', 'Religious', 'Sports', 'Beach', 'Trekking','Hills','Historical','Food'];
        for ($i = 0; $i < 8; $i++) {
            Category::create([
                'title' => $title[$i],
                'icon' => 'https://s3.ap-south-1.amazonaws.com/itravor.com/Assets/Category-Icons/'.strtolower($title[$i]).'.png',
                'description' => $title[$i],
            ]);
        }
    }
}
