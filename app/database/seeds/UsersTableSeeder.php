<?php

use Faker\Factory as Faker;
use Faker\Provider\pt_BR\Internet;

class UsersTableSeeder extends Seeder
{

	public function run()
	{
        $faker = Faker::create();
        $count = User::count();
        $increment = ($count > DatabaseSeeder::$dimension)? $count : '';

        DB::table('users')->insert(array_map(function($index) use ($faker, $increment) {
            return [
                'username' => $faker->unique()->name,
                'email' => $increment. ' ' .$faker->unique()->email,
                'password' => Hash::make('password'),
                'speciality' => $faker->sentence(rand(1, 4)),
                'is_admin' => $index == 1,
                'gender' => ($faker->randomDigit % 2)? 'f' : 'm',
                'biography' => $faker->paragraph(),
                'picture_url' => str_replace('.html', '', $faker->url) . 'image.png',
                'active' => ($faker->randomDigit % 8) != 1,
            ];
        }, range(1, DatabaseSeeder::$dimension)));

        if ($count == 0) {
            DB::table('users')->insert([
                'username' => 'joço',
                'email' => 'joco@mail.com',
                'password' => Hash::make('asd'),
                'speciality' => 'boss',
                'is_admin' => 1,
                'gender' => 'm',
                'biography' => 'venceu do chuck noris.',
                'picture_url' => '',
                'active' => 1,
            ]);
        }
	}

}
