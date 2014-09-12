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
            $title = new Title;
            $title->name = $faker->sentence(rand(1, 4));
            $title->title_id = Title::all()->get(rand(0, Title::count() -1))->id;
            $title->forceSave();
		}
	}

}