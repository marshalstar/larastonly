<?php

use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{

	public function run()
	{
        $faker = Faker::create();
        $count = Tag::count();
        $increment = ($count > 30)? $count : '';

        DB::table('tags')->insert(array_map(function() use ($faker, $increment) {
            return [
                'name' => $faker->unique()->sentence(rand(1, 4)). ' ' .$increment,
            ];
        }, range(1, 30)));
	}

}
