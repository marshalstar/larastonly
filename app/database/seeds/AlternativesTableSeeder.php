<?php

use Faker\Factory as Faker;

class AlternativesTableSeeder extends Seeder
{

	public function run()
	{
		$count = Alternative::count();

		if($count == 0){
			DB::table('alternatives')->insert([ [
					'name' => 'Sim',
				],[
					'name' => 'Não'
				],[
					'name' => 'Não se aplica'
				]
			]);		
		}
	}

}
