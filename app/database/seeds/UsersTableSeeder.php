<?php

use Faker\Factory as Faker;
use Faker\Provider\pt_BR\Internet;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();
        $faker->addProvider(new Internet($faker));

		foreach(range(1, 29) as $index)
		{
            $user = new User;
            $user->username = $faker->userName;
            $user->email = $faker->unique()->email;
            $user->password = 'password';
            $user->password_confirmation = 'password';
            $user->speciality = $faker->sentence(rand(1, 4));
            $user->is_admin = $index == 1;
            $user->gender = ($faker->randomDigit % 2)? 'f' : 'm';
            $user->biography = $faker->paragraph();
            $user->picture_url = str_replace('.html', '', $faker->url) . 'image.png';
            $user->save();
		}
	}

}
