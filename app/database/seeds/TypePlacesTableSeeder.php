<?php

use Faker\Factory as Faker;

class TypePlacesTableSeeder extends Seeder
{

	public function run()
	{
        /* old code (random names)$faker = Faker::create('pt_BR');
        $count = TypePlace::count();
        $increment = ($count > 30)? $count : '';

        DB::table('typePlaces')->insert(array_map(function() use ($faker, $increment) {
            return [
                'name' => $faker->unique()->sentence(rand(1, 4)). ' ' .$increment,
            ];
        }, range(1, DatabaseSeeder::$dimension)));*/
        DB::table('typePlaces')->insert([[
                'name' => 'museu',
            ], [
                'name' => 'hospital',
            ], [
                'name' => 'prédio',
            ], [
                'name' => 'escola',
            ], [
                'name' => 'faculdade',
            ], [
                'name' => 'praça',
            ]
        ]);
	}

}
