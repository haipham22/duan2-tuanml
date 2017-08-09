<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Category::class, 10)->create()->each(function (\App\Models\Category $category) {
            $category->posts()
                ->save(factory(\App\Models\Post::class)->create());
        });
        /*$faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i<=100; $i++) {
            \App\Models\Category::create([
                'name'  => $faker->title,
                'slug'  => $faker->slug,
                'status' => rand(0, 1),
                'orders'    => rand(1, 50),
            ]);
        }*/
    }
}
