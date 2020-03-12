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

                            @foreach($qs as $q)
                                <tbody>
                                <td>Q{{$q->q_no}}</td>
                                <td>{!!
                                Str::limit(strip_tags($q->question_text ),30)
                                !!}</td>
                                <td>
                                    <?php $hasAnswer=$answers->where('question_id',$q->id)->pluck('answer_text')->first();
                                    $answer_id = $answers->where('question_id',$q->id)->pluck('id')->first();
                                    ?>
                                    @if($hasAnswer)
                                            <p class="text-success">Answer Submitted</p>
                                        @else
                                        <p class="text-danger">Answer not submitted yet</p>
                                    @endif
                                </td>
                                <td style=" display: flex; flex-direction: column;  ">
                                    @if($hasAnswer)
                                        <a href="{{route('answers.edit',$answer_id)}}" class="btn btn-primary btn-sm">Edit</a>

                                    @else
                                        <a href="{{route('answers.create')}}" class="btn btn-success btn-sm">Answer</a>
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
