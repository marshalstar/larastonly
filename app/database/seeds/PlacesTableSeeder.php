<?php

use Faker\Factory as Faker;

class PlacesTableSeeder extends Seeder {

	public function run()
	{
	    $faker = Faker::create();
        $cities = City::all();
        $types = Type::all();

        DB::table('places')->insert(array_map(function() use ($faker, $cities, $types) {
            return [
                'name' => $faker->sentence(rand(1, 4)),
                'city_id' => $cities->get(rand(0, $cities->count() -1))->id,
                'type_id' => $types->get(rand(0, $types->count() -1))->id,
            ];
        }, range(1, 30)));
	}

}
