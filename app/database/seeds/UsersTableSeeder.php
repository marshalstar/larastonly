<?php

use Faker\Factory as Faker;
use Faker\Provider\pt_BR\Internet;

class UsersTableSeeder extends Seeder
{

	public function run()
	{
        $faker = Faker::create();

        DB::table('users')->insert(array_map(function($index) use ($faker) {
            return [
                'username' => $faker->userName,
                'email' => $faker->unique()->email,
                'password' => 'password',
                'speciality' => $faker->sentence(rand(1, 4)),
                'is_admin' => $index == 1,
                'gender' => ($faker->randomDigit % 2)? 'f' : 'm',
                'biography' => $faker->paragraph(),
                'picture_url' => str_replace('.html', '', $faker->url) . 'image.png',
            ];
        }, range(1, 30)));
	}

}
