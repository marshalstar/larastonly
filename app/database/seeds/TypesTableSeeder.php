<?php

use Faker\Factory as Faker;

class TypesTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();
        $count = Type::count();
        $increment = ($count > DatabaseSeeder::$dimension)? $count : '';

        DB::table('types')->insert(array_map(function() use ($faker, $increment) {
            return [
                'name' => $faker->unique()->sentence(rand(1, 4)). ' ' .$increment,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}