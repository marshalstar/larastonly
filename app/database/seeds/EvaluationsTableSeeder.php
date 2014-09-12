<?php

use Faker\Factory as Faker;

class EvaluationsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
            $evaluation = new Evaluation;
            $evaluation->user_id = User::all()->get(rand(0, User::count() -1))->id;
            $evaluation->checklist_id = Checklist::all()->get(rand(0, Checklist::count() -1))->id;
            $evaluation->commentary = $faker->paragraph();
            $evaluation->forceSave();
		}
	}

}