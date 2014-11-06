<?php

use Faker\Factory as Faker;

class PlacesTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create('pt_BR');
        $cities = City::all();
        $typePlaces = TypePlace::all();

        DB::table('places')->insert(array_map(function() use ($faker, $cities, $typePlaces) {
            return [
                'name' => $faker->unique()->address,
                'city_id' => $cities->get(rand(0, $cities->count() -1))->id,
                'typePlace_id' => $typePlaces->get(rand(0, $typePlaces->count() -1))->id,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}
