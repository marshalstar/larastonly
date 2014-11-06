<?php

use Faker\Factory as Faker;

class CitiesTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create('pt_BR');
        $states = State::all();

        DB::table('cities')->insert(array_map(function() use ($faker, $states) {
            return [
                'name' => $faker->city,
                'state_id' => $states->get(rand(0, $states->count() -1))->id,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}
