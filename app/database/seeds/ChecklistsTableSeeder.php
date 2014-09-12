<?php

use Faker\Factory as Faker;

class ChecklistsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();

        DB::table('checklists')->insert(array_map(function() use ($faker) {
            return [
                'name' => $faker->sentence(rand(1, 4)),
                'user_id' => User::all()->get(rand(0, User::count() -1))->id,
                'title_id' => Title::all()->get(rand(0, Title::count() -1))->id,
            ];
        }, range(1, 30)));
	}

}
