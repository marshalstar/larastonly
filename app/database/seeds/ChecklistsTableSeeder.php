<?php

use Faker\Factory as Faker;

class ChecklistsTableSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker::create();
        $users = User::all();

        $number = intval(DatabaseSeeder::$dimension/10) +1;
        DB::table('checklists')->insert(array_map(function() use ($faker, $users) {
            return [
                'name' => $faker->sentence(rand(1, 4)),
                'user_id' => $users->get(rand(0, $users->count() -1))->id,
                'created_at' => $faker->dateTimeThisMonth(),
                'updated_at' => $faker->dateTimeThisMonth(),
            ];
        }, range(1, $number)));
	}

}
