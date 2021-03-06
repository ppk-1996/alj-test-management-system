<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Array_;
use stdClass;
use Symfony\Component\Console\Input\Input;

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
        $output = "Sorry, this question does not have example yet.";
        $myfile = fopen($request->file('textfile'), "r") or die("Unable to open file!");
        //            $code = $question->example;
        //            eval($code);
        if ($qno == 1) {
            $input = intval(fgets($myfile));
            $output = sprintf('%03d', $input);
        }
        if ($qno == 2) {
            $biggest = intval(fgets($myfile));
            rewind($myfile);
            $smallest = intval(fgets($myfile));
            rewind($myfile);

            while (!feof($myfile)) {
                $input = intval(fgets($myfile));
                if ($input > $biggest) {
                    $biggest = $input;
                } elseif ($input < $smallest) {
                    $smallest = $input;
                }
            }
            $output = $biggest . "\n" . $smallest;
        }
        if ($qno == 3) {
            $wcount = 0;
            while (!feof($myfile)) {
                $input = fgetc($myfile);
                if ($input == "W")
                    $wcount++;
            }
            if ($wcount >= 5) {
                $output = "OK";
            } else {
                $output = "NG";
            }
        }
        if ($qno == 4) {
            $input = fgets($myfile);
            $output = "";
            while (!feof($myfile)) {
                $inputArr = explode(' ', fgets($myfile));

                for ($i = 0; $i < sizeof($inputArr); $i++) {

                    if ($inputArr[$i] >= 128) {
                        $output .= "1";
                    } else {
                        $output .= "0";
                    }
                    if ($i != sizeof($inputArr) - 1) {
                        $output .= " ";
                    }
                }
                $output .= "\n";
            }
        }

        if ($qno == 5) {
            $output = "";
            $tags = fgets($myfile);
            $tagsArr = preg_split('/\s+/', $tags);
            //$tagsArr = explode(' ', $tags);
            $firstTag = $tagsArr[0];
            $secondTag = $tagsArr[1];
            $content = fgets($myfile);

            $stringArr = explode($firstTag, $content);
            $result = array();
            foreach ($stringArr as $string) {
                $pos = strpos($string, $secondTag);
                if ($pos !== false) {
                    $result[] = substr($string, 0, $pos);
                }
            }
            foreach ($result as $data) {
                if ($data == '') {
                    $output .= "<blank>" . "\n";
                } else {
                    $output .= $data . "\n";
                }
            }
        }
        if ($qno == 6) {
            $input = fgets($myfile);
            $durationsArr = explode(' ', $input);
            $a = intval($durationsArr[0]);
            $b = intval($durationsArr[1]);
            $c = intval($durationsArr[2]);
            $depFreq = intval(fgets($myfile));
            $dep = array();
            $dep_min = array();
            for ($i = 0; $i < $depFreq; $i++) {
                $dep[$i] = explode(' ', fgets($myfile));
                $dep_min[$i] = intval($dep[$i][0]) * 60 + intval($dep[$i][1]);
            }
            $limit = 539;
            //Now we got a,b,c and all departure times in minutes
            $bToC = $b + $c;
            for ($i = sizeof($dep_min) - 1; $i >= 0; $i--) {
                if ($dep_min[$i] + $bToC < $limit) {
                    $chosenOne = $dep_min[$i];
                    $leaveTime = $chosenOne - $a;
                    $hour = floor($leaveTime / 60);
                    $minute = ($leaveTime % 60);
                    $output = sprintf('%02d:%02d', $hour, $minute);
                    break;
                }
            }
        }
        if ($qno == 7) {
            $output = "";
            $inputArr = explode(' ', fgets($myfile));
            $H = $inputArr[0];
            $W = $inputArr[1];
            $N = $inputArr[2];
            $container = array();
            for ($i = 0; $i < $H; $i++) {
                for ($j = 0; $j < $W; $j++) {
                    $container[$i][$j] = ".";
                }
            }

            $inputArr = array();
            while (!feof($myfile)) {
                array_push($inputArr, explode(' ', fgets($myfile)));
            }
            $blocks = array();
            foreach ($inputArr as $arr) {

                array_push($blocks, new Block($arr[0], $arr[1], $arr[2]));
            }
            foreach ($blocks as $b) {

                $h = $b->getHeight();
                $w = $b->getWidth();
                $x = $b->getXpos();
                $y = $b->findConflictY($container) - 1;

                $x_start = $x;
                $x_end = $x + $w;

                $y_start = $y;
                $y_end = $y - $h;

                for ($x_axis = $x_start; $x_axis < $x_end; $x_axis++) {
                    for ($y_axis = $y_start; $y_axis > $y_end; $y_axis--) {
                        $container[$y_axis][$x_axis] = '#';
                    }
                }
            }

            for ($i = 0; $i < $H; $i++) {
                for ($j = 0; $j < $W; $j++) {

                    $output .= $container[$i][$j];
                }
                $output .= "\n";
            }
        }
        if ($qno == 8) {
            $inputArr = explode(' ', fgets($myfile));
            $highligted = array();
            $removeHL = false;
            while (!feof($myfile)) {
                $inputArr = explode(' ', fgets($myfile));
                $startPos = intval($inputArr[0]);
                $endPos = intval($inputArr[1]);
                for ($i = $startPos; $i <= $endPos; $i++) {

                    if (in_array($i, $highligted)) {
                        $removeHL = true;
                    } else {
                        $removeHL = false;
                        break;
                    }
                }
                for ($i = $startPos; $i <= $endPos; $i++) {
                    if (!$removeHL) {

                        array_push($highligted, $i);
                        $highligted = array_unique($highligted);
                    } else {

                        if (($key = array_search($i, $highligted)) !== false) {
                            unset($highligted[$key]);
                        }
                    }
                }
            }

            $output = sizeof($highligted);
        }


        if ($qno == 9) {

            $stack = array();
            $values = array(
                ')' => '(',
                '}' => '{',
                ']' => '['
            );
            $openP = array('(', '{', '[');

            $closeP = array(')', '}', ']');

            $goodP = true;
            $input = fgets($myfile);

            $inputArr = str_split($input);

            foreach ($inputArr as $p) {

                if (in_array($p, $openP)) {
                    array_push($stack, $p);
                } elseif (in_array($p, $closeP)) {
                    if (end($stack) == $values[$p]) {
                        array_pop($stack);
                    } else {
                        $goodP = false;
                        break;
                    }
                }
            }
            if ($goodP) {
                $output = "true";
            } else {
                $output = "false";
            }
        }
        if($qno==10){
            $string=fgets($myfile);
            $output=ucwords($string);
        }
        if($qno==11){
            $inputArr=explode(' ',fgets($myfile));
            $n=$inputArr[0];
            $p=$inputArr[1];
            $total=0;
            $output=-1;
            $digits=str_split((string)$n);
            foreach($digits as $d){
                $total+=pow(intval($d),intval($p));
                $p++;
            }
            if($total%$n==0){
                $output=$total/$n;
              }
              
        }
        if($qno==12){
           $current_user= Auth::user();
           
        }



        fclose($myfile);
        return view('test.calculated')->with(['output' => $output, 'question' => $question]);
    }
}

class Block
{
    protected $height, $width, $xpos;

    public function __construct($h, $w, $x)
    {
        $this->height = intval($h);
        $this->width = intval($w);
        $this->xpos = intval($x);
    }

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return integer
     */
    public function getXpos()
    {
        return $this->xpos;
    }

    /**
     * @param $container
     * @return int
     */
    public function findConflictY(array $container)
    {
        $x_start = $this->xpos;
        $x_end = $this->xpos + $this->width;
        $y_end = sizeof($container);


        for ($y = 0; $y < $y_end; $y++) {

            for ($x = $x_start; $x < $x_end; $x++) {
                if ($container[$y][$x] == '#') {
                    return $y;
                }
            }
        }

        return $y;
    }
}
