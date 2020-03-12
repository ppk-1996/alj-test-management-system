<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        $user = auth()->user()->id;
        $answers = Answer::where('user_id', $user)->get();

        return view('test.index')->with(['questions' => $questions, 'answers' => $answers]);
    }

    public function show(Question $question)
    {
        return view('test.show')->with('question', $question);
    }

    public function edit(Question $question, Answer $answer)
    {

        return view('test.edit')->with(['question' => $question, 'answer' => $answer]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'answer_text' => 'required'
        ]);
        $answer = new Answer();
        $answer->answer_text = $request->input('answer_text');
        $answer->question_id = $request->input('q_id');
        $answer->user_id = auth()->user()->id;
        $answer->save();
        return redirect(route('test.index'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'answer_text' => 'required'
        ]);
        $answer = Answer::find($id);
        $answer->answer_text = $request->input('answer_text');
        $answer->question_id = $request->input('q_id');
        $answer->user_id = auth()->user()->id;
        $answer->save();
        return redirect(route('test.index'));
    }

    public function showExample(Question $question)
    {

        return view('test.example')->with('question', $question);
    }

    public function calculateExample(Request $request, Question $question)
    {
        $qno = $question->q_no;
        $output = "ERROR IN FORMATTING THE FILE FOR Q".$qno;
        $myfile = fopen($request->file('textfile'), "r") or die("Unable to open file!");


        if ($qno == 1) {
            $input = intval(fgets($myfile));
            if ($input == 0) {
                $output = "Your file has wrong format. It should be integer";
            } else {
                $output = sprintf('%03d', $input);
            }
        }

        elseif($qno==2){
            $biggest=intval(fgets($myfile));
            $smallest=intval(fgets($myfile));
            rewind($myfile);

            while(!feof($myfile)) {
                $input=intval(fgets($myfile));
                if($input>$biggest){
                    $biggest=$input;
                    echo $biggest;
                }elseif ($input<$smallest){
                    $smallest=$input;
                    echo $smallest;
                }
            }


            $output=$biggest."<br>".$smallest;

        }













        fclose($myfile);


        return view('test.calculated')->with('output', $output);
    }


}
