<?php

use Faker\Factory as Faker;

class TitlesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        Title::create([
            'name' => $faker->sentence(rand(1, 4)),
        ]);

		foreach(range(1, 29) as $index)
		{
			Title::create([
                'name' => $faker->sentence(rand(1, 4)),
                'title_id' => Title::all()->get(rand(0, Title::count() -1))->id,
			]);
		}
	}

}