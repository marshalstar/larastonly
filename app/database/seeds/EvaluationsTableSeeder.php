<?php

use Faker\Factory as Faker;

class EvaluationsTableSeeder extends Seeder
{

	public function run()
	{
        $faker = Faker::create('pt_BR');
        $users = User::all();
        $checklists = Checklist::all();
        $places = Place::all();

        DB::table('evaluations')->insert(array_map(function() use ($faker, $users, $checklists, $places) {
            return [
                'user_id' => $users->get(rand(0, $users->count() -1))->id,
                'checklist_id' => $checklists->get(rand(0, $checklists->count() -1))->id,
                'place_id' => $places->get(rand(0, $places->count() -1))->id,
                'commentary' => $faker->paragraph(),
                'created_at' => $faker->dateTimeThisMonth(),
                'updated_at' => $faker->dateTimeThisMonth(),
            ];
        }, range(1, DatabaseSeeder::$dimension)));
	}

}