<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'  => 'Hải Phạm',
            'email' => 'haipham.net@gmail.com',
            'password' => bcrypt('sonhai'),
        ]);
        $faker = Faker\Factory::create('vi_VN');
        for ($i = 0; $i <= 1000; $i++) {
            \App\Models\User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password'  => bcrypt('123456'),
            ]);
        }
    }
}
