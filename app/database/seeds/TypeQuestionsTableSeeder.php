<?php

class TypeQuestionsTableSeeder extends Seeder
{

	public function run()
	{
		$count = TypeQuestion::count();
		if ($count == 0) {
			DB::table('typeQuestions')->insert([[
	                'name' => 'radio',
	            ], [
	                'name' => 'checkbox',
	            ]
	        ]);
		}
	}

}