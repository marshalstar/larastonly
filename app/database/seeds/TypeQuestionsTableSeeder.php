<?php

class TypeQuestionsTableSeeder extends Seeder
{

	public function run()
	{
        DB::table('typeQuestions')->insert([[
                'name' => 'radio',
            ], [
                'name' => 'checkbox',
            ]
        ]);
	}

}