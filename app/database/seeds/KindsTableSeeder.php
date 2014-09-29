<?php

use Faker\Factory as Faker;

class KindsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Kind::create([

			]);
		}
	}

}
