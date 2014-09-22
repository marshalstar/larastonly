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

        DB::disableQueryLog();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->truncateTables();

        $this->seederTables();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::enableQueryLog();

        $this->command->comment('========== Vai trabalhar ==========');

        foreach (range(1, 10) as $i) {
            $this->seederTables();
        }
	}

    private function truncateTables()
    {
        Tag::count() && Tag::truncate();
        User::count() && User::truncate();
        Checklist::count() && Checklist::truncate();
        Title::count() && Title::truncate();
        Evaluation::count() && Evaluation::truncate();
        Type::count() && Type::truncate();
        Question::count() && Question::truncate();
        Alternative::count() && Alternative::truncate();
        Answer::count() && Answer::truncate();
        DB::table('alternative_question')->count() && DB::table('alternative_question')->truncate();
        DB::table('checklist_tag')->count() && DB::table('checklist_tag')->truncate();
        $this->command->comment('Truncate Tables');
    }

    private function seederTables()
    {
        $this->call('TagsTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('ChecklistsTableSeeder');
        $this->call('TitlesTableSeeder');
        $this->call('EvaluationsTableSeeder');
        $this->call('TypesTableSeeder');
        $this->call('QuestionsTableSeeder');
        $this->call('AlternativesTableSeeder');
        $this->call('AlternativesQuestionsTableSeeder');
        $this->call('AnswersTableSeeder');
    }

}
