@extends('layouts.app')
@section('content')
    <a href="{{route('test.index')}}" class="btn btn-sm btn-outline-dark">Go Back</a>
    <h3>Q{{$question->q_no}}</h3>
    <p>{!! $question->question_text !!}</p>
    <a href="{{route('test.example.show',$question)}}" class="btn btn-outline-dark">See Example</a>
    <form method="post" action="{{route('test.update',$answer->id)}}">
        @csrf
        @method('PUT')
        <input name="q_id" value="{{$question->id}}" hidden/>
        <div class="form-group">

            <label for="editor1">Answer:</label>
            <textarea id="editor1" class="form-control" name="answer_text" placeholder="Type content">
                {!! $answer->answer_text!!}
            </textarea>
        </div>


        <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg">Update Answer</button>
        </div>
    </form>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection