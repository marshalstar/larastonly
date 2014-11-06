<?php

use Faker\Factory as Faker;

class AlternativesTableSeeder extends Seeder
{

	public function run()
	{
        $faker = Faker::create('pt_BR');
        $types = Type::all();

        DB::table('alternatives')->insert(array_map(function() use ($faker, $types) {
            return [
                'name' => $faker->sentence(),
                'type_id' => $types->get(rand(0, $types->count() -1))->id,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}
