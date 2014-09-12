<?php

use Faker\Factory as Faker;

class ChecklistsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
            $checklist = new Checklist;
            $checklist->name = $faker->sentence(rand(1, 4));
            $checklist->user_id = User::all()->get(rand(0, User::count() -1))->id;
            $checklist->title_id = Title::all()->get(rand(0, Title::count() -1))->id;
            $checklist->forceSave();
		}
	}

}
