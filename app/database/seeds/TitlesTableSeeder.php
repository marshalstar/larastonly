<?php

use Faker\Factory as Faker;

class TitlesTableSeeder extends Seeder
{

	public function run()
	{

        $faker = Faker::create('pt_BR');
        $checklists = Checklist::all(['id']);

        $number = intval(DatabaseSeeder::$dimension/3) +1;

        DB::table('titles')->insert(array_filter(array_map(function($index) use ($faker) {
            return [
                'name' => $faker->sentence(rand(1, 4)),
                'checklist_id' => $index,
            ];
        }, array_column($checklists->toArray(), 'id'))));

        foreach (range(1, 3) as $i) {
            $this->newChildrenTitles($number, $faker);
        }
	}

    private function newChildrenTitles($count, $faker)
    {
        if ($count > 0 && $faker) {
            $titles = Title::all();
            DB::table('titles')->insert(array_map(function() use ($count, $titles, $faker) {
                $title = $titles->get(mt_rand(0, $titles->count() -1));
                return [
                    'name' => $faker->sentence(rand(1, 4)),
                    'title_id' => $title->id,
                    'checklist_id' => $title->checklist->id,
                ];
            }, range(0, $count -1)));
        }
    }

}