@extends('layouts.app')
@section('content')
    <a href="{{route('test.show',$question)}}" class="btn btn-outline-dark btn-sm">Back</a>
    <h1>Q{{$question->q_no}} Example</h1>
    <p>Choose a text file that is formatted as per question.</p>


    <form method="post" action="{{route('test.example.calculate',$question)}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <input type="file" id="fileToUpload" name="textfile">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection