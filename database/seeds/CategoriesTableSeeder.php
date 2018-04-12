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
        
        $title = ['Adventure', 'Religious', 'Sports', 'Beach', 'Trekking'];
        for ($i = 0; $i < 5; $i++) {
            Category::create([
                'title' => $title[$i],
                'icon' => '../assets/icons/'.strtolower($title[$i]).'.png',
                'description' => $title[$i],
            ]);
        }
    }
}
