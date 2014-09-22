<?php

use Faker\Factory as Faker;

class EvaluationsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();
        $checklists = Checklist::all();

        DB::table('evaluations')->insert(array_map(function() use ($faker, $checklists) {
            return [
                'user_id' => User::all()->get(rand(0, User::count() -1))->id,
                'checklist_id' => $checklists->get(rand(0, $checklists->count() -1))->id,
                'commentary' => $faker->paragraph(),
            ];
        }, range(1, 30)));
	}

}