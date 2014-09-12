<?php

use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{

	public function run()
	{
        $faker = Faker::create();

        DB::table('tags')->insert(array_map(function() use ($faker) {
            return [
                'name' => $faker->unique()->sentence(rand(1, 4)),
            ];
        }, range(1, 30)));
	}

}
