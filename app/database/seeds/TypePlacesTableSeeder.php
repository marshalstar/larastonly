<?php

use Faker\Factory as Faker;

class TypePlacesTableSeeder extends Seeder
{

	public function run()
	{
        $faker = Faker::create();
        $count = TypePlace::count();
        $increment = ($count > 30)? $count : '';

        DB::table('typePlaces')->insert(array_map(function() use ($faker, $increment) {
            return [
                'name' => $faker->unique()->sentence(rand(1, 4)). ' ' .$increment,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}
