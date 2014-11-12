<?php

use Faker\Factory as Faker;

class QuestionsTableSeeder extends Seeder
{

	public function run()
	{
        $faker = Faker::create('pt_BR');
        $titles = Title::all();
        $count = Question::count();
        $typeQuestions = TypeQuestion::all();

        if ($count == 0) {
            DB::table('questions')->insert([
                [
                    'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                    'statement' => 'Tem rampas de acesso?',
                    'weight' => $faker->randomDigit,
                    'created_at' => $faker->dateTimeThisYear,
                    'updated_at' => $faker->dateTimeThisMonth,
                    'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
                ], [
                    'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                    'statement' => 'O predio dispoem de elevadores para locomocao de cadeirantes?',
                    'weight' => $faker->randomDigit,
                    'created_at' => $faker->dateTimeThisYear,
                    'updated_at' => $faker->dateTimeThisMonth,
                    'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
                ], [
                    'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                    'statement' => 'O rebaixamento de calcadas foi construido na direcao do fluxo de pedestres?',
                    'weight' => $faker->randomDigit,
                    'created_at' => $faker->dateTimeThisYear,
                    'updated_at' => $faker->dateTimeThisMonth,
                    'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
                ], [
                    'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                    'statement' => 'O predio possui sinalizacao para as saidas de emergencia?',
                    'weight' => $faker->randomDigit,
                    'created_at' => $faker->dateTimeThisYear,
                    'updated_at' => $faker->dateTimeThisMonth,
                    'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
                ], [
                    'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                    'statement' => 'A largura dos corredores e a minima exigida pelas normas da ABNT?',
                    'weight' => $faker->randomDigit,
                    'created_at' => $faker->dateTimeThisYear,
                    'updated_at' => $faker->dateTimeThisMonth,
                    'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
                ], [
                    'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                    'statement' => 'O predio conta com banheiros equipados para cadeirantes?',
                    'weight' => $faker->randomDigit,
                    'created_at' => $faker->dateTimeThisYear,
                    'updated_at' => $faker->dateTimeThisMonth,
                    'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
                ], [
                    'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                    'statement' => 'A sinalizacao de alertas visuais esta associada com as sinalizacoes tateis?',
                    'weight' => $faker->randomDigit,
                    'created_at' => $faker->dateTimeThisYear,
                    'updated_at' => $faker->dateTimeThisMonth,
                    'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
                ], [
                    'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                    'statement' => 'A guia rebaixada das calcadas possui sinalizacao tatil e alerta?',
                    'weight' => $faker->randomDigit,
                    'created_at' => $faker->dateTimeThisYear,
                    'updated_at' => $faker->dateTimeThisMonth,
                    'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
                ], [
                    'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                    'statement' => 'As guias rebaixadas possuem entre 0,20cm e 0,60cm?',
                    'weight' => $faker->randomDigit,
                    'created_at' => $faker->dateTimeThisYear,
                    'updated_at' => $faker->dateTimeThisMonth,
                    'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
                ], [
                    'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                    'statement' => 'As rotas de fuga do predio oferecem um caminho seguro para o usuario?',
                    'weight' => $faker->randomDigit,
                    'created_at' => $faker->dateTimeThisYear,
                    'updated_at' => $faker->dateTimeThisMonth,
                    'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
                ],
            ]);
        }/**/

        /*DB::table('questions')->insert(array_map(function() use ($faker, $titles, $count, $typeQuestions) {
            return [
                'title_id' => $titles->get(rand(0, $titles->count() -1))->id,
                'statement' => $faker->unique()->paragraph(). ' ' .$count,
                'weight' => $faker->randomDigit,
                'created_at' => $faker->dateTimeThisYear,
                'updated_at' => $faker->dateTimeThisMonth,
                'typeQuestion_id' => $typeQuestions->get(rand(0, $typeQuestions->count() -1))->id,
            ];
        }, range(1, DatabaseSeeder::$dimension)));/**/
	}

}