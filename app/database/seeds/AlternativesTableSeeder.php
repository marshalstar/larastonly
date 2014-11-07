<?php

use Faker\Factory as Faker;

class AlternativesTableSeeder extends Seeder
{

	public function run()
	{
        $faker = Faker::create('pt_BR');

        DB::table('alternatives')->insert(array_map(function() use ($faker) {
            return [
                'name' => $faker->sentence(),
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}
