<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        /*\App\Models\Post::create([
            'name' =>  $faker->unique->title,
            'slug'  => $faker->slug,

        ]);*//*
        factory(\App\Models\Post::class, 10)->create()->each(function (\App\Models\Post $post) {
            $post->
        });*/
    }
}
