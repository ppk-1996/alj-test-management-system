<?php

use Illuminate\Database\Seeder;
use App\Answer;
use App\User;
class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::truncate();

        Answer::create([
            'answer_text'=>"This is my answer for q1",
            'user_id'=> '3',
            'question_id'=>'1'
        ]);
        Answer::create([
            'answer_text'=>"This is my answer for q2",
            'user_id'=> '3',
            'question_id'=>'2'
        ]);
        Answer::create([
            'answer_text'=>"This is my answer for q3",
            'user_id'=> '3',
            'question_id'=>'3'
        ]);
    }
}
