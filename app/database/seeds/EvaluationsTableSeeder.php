<?php

use Faker\Factory as Faker;

class EvaluationsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			Evaluation::create([
                'user_id' => User::all()->get(rand(0, User::count() -1))->id,
                'checklist_id' => Checklist::all()->get(rand(0, Checklist::count() -1))->id,
                'commentary' => $faker->paragraph(),
			]);
		}
	}

}