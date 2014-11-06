<?php

use Faker\Factory as Faker;

class TypeAlternativesTableSeeder extends Seeder
{

	public function run()
	{
        /* old code (random names)
		$faker = Faker::create('pt_BR');
        $count = Type::count();
        $increment = ($count > DatabaseSeeder::$dimension)? $count : '';

        DB::table('types')->insert(array_map(function() use ($faker, $increment) {
            return [
                'name' => $faker->unique()->sentence(rand(1, 4)). ' ' .$increment,
            ];
        }, range(1, DatabaseSeeder::$dimension)));/**/
        DB::table('typeAlternatives')->insert([[
                'name' => 'radio',
            ], [
                'name' => 'checkbox',
            ]
        ]);
	}

}