@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{Auth::user()->name}}'s Test Progress</div>

                    <div class="card-body">


                        <table class="table table-striped">
                            <thead>
                            <th>No.</th>
                            <th>Question</th>
                            <th>Answer Status</th>
                            <th class="text-center">Action</th>
                            </thead>

                            @foreach($questions as $question)
                                <tbody>
                                <td>Q{{$question->q_no}}</td>
                                <td>{!!
                                Str::limit(strip_tags($question->question_text ),30)
                                !!}</td>
                                <td>
                                    <?php
                                    $ans = $answers->where('question_id', $question->id)->first();
                                    ?>
                                    @if($ans)
                                        <p class="text-success">Answer Submitted</p>
                                    @else
                                        <p class="text-danger">Answer not submitted yet</p>
                                    @endif
                                </td>
                                <td style=" display: flex; flex-direction: column;  ">
                                    @if($ans)
                                        <a href="{{route('test.edit',['question'=>$question,'answer'=>$ans])}}"
                                           class="btn btn-primary btn-sm">Edit Answer</a>

                                    @else
                                        <a href="{{route('test.show',$question)}}"
                                           class="btn btn-success btn-sm">Answer Q{{$question->q_no}}</a>
                                    @endif


                                </td>
                                </tbody>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
