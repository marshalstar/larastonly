<?php

use Faker\Factory as Faker;

class AlternativesTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

        DB::table('alternatives')->insert(array_map(function() use ($faker) {
            return [
                'name' => $faker->sentence(),
                'type_id' => Type::all()->get(rand(0, Type::count() -1))->id,
            ];
        }, range(1, 30)));
	}

}
