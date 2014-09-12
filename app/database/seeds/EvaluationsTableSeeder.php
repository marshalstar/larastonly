<?php

use Faker\Factory as Faker;

class EvaluationsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

        DB::table('evaluations')->insert(array_map(function() use ($faker) {
            return [
                'user_id' => User::all()->get(rand(0, User::count() -1))->id,
                'checklist_id' => Checklist::all()->get(rand(0, Checklist::count() -1))->id,
                'commentary' => $faker->paragraph(),
            ];
        }, range(1, 30)));
	}

}