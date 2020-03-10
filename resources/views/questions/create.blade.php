@extends('layouts.app')
@section('content')
    <h1>Create Question</h1>
    <form method="post" action="{{route('questions.create')}}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">

            <textarea id="editor1" class="form-control" name="body" placeholder="Type content"></textarea>
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