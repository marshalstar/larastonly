<?php

use Faker\Factory as Faker;

class PlacesTableSeeder extends Seeder {

	public function run()
	{
	    $faker = Faker::create();
        $states = State::all();
        $types = Type::all();

        DB::table('places')->insert(array_map(function() use ($faker, $states, $types) {
            return [
                'name' => $faker->sentence(rand(1, 4)),
                'state_id' => $states->get(rand(0, $states->count() -1))->id,
                'type_id' => $types->get(rand(0, $types->count() -1))->id,
            ];
        }, range(1, 30)));
	}

}
