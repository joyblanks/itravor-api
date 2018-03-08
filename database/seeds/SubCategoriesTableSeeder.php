<?php

use Illuminate\Database\Seeder;

use App\SubCategory;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        SubCategory::create([
            'title' => 'Random',
            'icon' => '../assets/images/logo.png',
            'description' => $faker->sentence,
            'category_id' => 1
        ]);
    }
}
