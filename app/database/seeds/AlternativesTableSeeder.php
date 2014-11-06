<?php

use Faker\Factory as Faker;

class AlternativesTableSeeder extends Seeder
{

	public function run()
	{
        $faker = Faker::create('pt_BR');
        $typeAlternatives = TypeAlternative::all();

        DB::table('alternatives')->insert(array_map(function() use ($faker, $typeAlternatives) {
            return [
                'name' => $faker->sentence(),
                'typeAlternative_id' => $typeAlternatives->get(rand(0, $typeAlternatives->count() -1))->id,
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}
