<?php

class DatabaseSeeder extends Seeder
{

    private static $NUM_CICLES = 30;
    public static $dimension = 3;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        DB::disableQueryLog();

        $driver = DB::connection()->getConfig('driver');
        stripos($driver, 'mysql') !== false && DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->truncateTables();
        $this->seederTables();

        stripos($driver, 'mysql') !== false && DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::enableQueryLog();

        $this->command->comment('========== Pode ir programar ==========');

        $option = $this->command->ask("continuar ciclos (".self::$NUM_CICLES." no total)?");
        if (!in_array($option, ['no', 'n'])) {
            foreach (range(2, self::$NUM_CICLES) as $i) {
                $this->command->comment("===== ciclo $i =====");
                $this->seederTables();
            }
        } else {
            $this->command->comment("Comando cancelado!");
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
        Country::count() && Country::truncate();
        State::count() && State::truncate();
        City::count() && City::truncate();
        Place::count() && Place::truncate();
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
        $this->call('CountriesTableSeeder');
        $this->call('StatesTableSeeder');
        $this->call('CitiesTableSeeder');
        $this->call('PlacesTableSeeder');
    }

}
