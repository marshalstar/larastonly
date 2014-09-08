<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Tag::truncate();
        User::truncate();
        Title::truncate();
        Checklist::truncate();
        Evaluation::truncate();
        Type::truncate();
        Question::truncate();
        Alternative::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->command->comment('Truncate Tables');

        $this->call('TagsTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('TitlesTableSeeder');
        $this->call('ChecklistsTableSeeder');
        $this->call('EvaluationsTableSeeder');
        $this->call('TypesTableSeeder');
        $this->call('QuestionsTableSeeder');
        $this->call('AlternativesTableSeeder');
	}

}
