<?php

use Faker\Factory as Faker;

class PlacesTableSeeder extends Seeder {

	public function run()
	{
	    $faker = Faker::create();
        $cities = City::all();
        $tags = Tag::all();

        DB::table('places')->insert(array_map(function() use ($faker, $cities, $tags) {
            return [
                'name' => $faker->sentence(rand(1, 4)),
                'city_id' => $cities->get(rand(0, $cities->count() -1))->id,
                'tag_id' => $tags->get(rand(0, $tags->count() -1))->id,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}
