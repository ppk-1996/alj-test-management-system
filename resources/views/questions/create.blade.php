@extends('layouts.app')
@section('content')
    <a href="{{route('questions.index')}}" class="btn btn-sm btn-outline-dark">Go Back</a>
    <h1>Create Question</h1>
    <form method="post" action="{{route('questions.store')}}">
        @csrf
        <div class="form-group">

            <label>
                Question No.
                <input type="text" name="q_no"/>
            </label>
        </div>
            <div class="form-group">


                <textarea id="editor1" class="form-control" name="question_text" placeholder="Type content"></textarea>
        </div>


       <div class="text-center">
           <button type="submit" class="btn btn-success btn-lg">Submit</button>
       </div>
    </form>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection