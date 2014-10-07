<?php

use Faker\Factory as Faker;

class TitlesTableSeeder extends Seeder
{

	public function run()
	{

        $faker = Faker::create();

        DB::table('titles')->insert(array_filter(array_map(function($index) use ($faker) {
            if (rand(0, 1)) {
                return [
                    'name' => $faker->sentence(rand(1, 4)),
                    'checklist_id' => Checklist::all()->get($index)->id,
                ];
            }
        }, range(1, DatabaseSeeder::$dimension -1))));

        foreach (range(1, 3) as $i) {
            $this->newChildrenTitles(intval(DatabaseSeeder::$dimension*DatabaseSeeder::$dimension/3), $faker);
        }
	}

    private function newChildrenTitles($count, $faker)
    {
        if ($count > 0 && $faker) {
            $titles = Title::all();
            DB::table('titles')->insert(array_map(function() use ($count, $titles, $faker) {
                $title = $titles->get(rand(0, $titles->count() -1));
                return [
                    'name' => $faker->sentence(rand(1, 4)),
                    'title_id' => $title->id,
                    'checklist_id' => $title->checklist->id,
                ];
            }, range(0, $count -1)));
        }
    }

}