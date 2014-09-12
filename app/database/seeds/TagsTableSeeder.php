<?php

use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();

		foreach(range(1, 30) as $fake)
		{
            $tag = new Tag;
            $tag->name = $faker->unique()->sentence(rand(1, 4));
            $tag->forceSave();
		}
	}

}
