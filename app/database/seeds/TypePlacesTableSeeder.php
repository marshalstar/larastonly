<?php

use Faker\Factory as Faker;

class TypePlacesTableSeeder extends Seeder
{

	public function run()
	{

        $count = TypePlace::count();

        if ($count == 0) {
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

}
