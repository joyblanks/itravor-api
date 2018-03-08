<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $title = ['Adventure', 'Religious', 'Sports', 'Beach', 'Trekking'];
        for ($i = 0; $i < 5; $i++) {
            Category::create([
                'title' => $title[$i],
                'icon' => '../assets/icons/'.strtolower($title[$i]).'.png',
                'description' => $faker->sentence,
            ]);
        }
    }
}
