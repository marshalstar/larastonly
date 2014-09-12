<?php

use Faker\Factory as Faker;

class TitlesTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

        Title::create([
            'name' => $faker->sentence(rand(1, 4)),
        ]);

        DB::table('titles')->insert(array_map(function() use ($faker) {
            return [
                'name' => $faker->sentence(rand(1, 4)),
                'title_id' => Title::all()->get(rand(0, Title::count() -1))->id,
            ];
        }, range(1, 29)));
	}

}