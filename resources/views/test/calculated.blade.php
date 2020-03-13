@extends('layouts.app')

@section('content')
    <a href="{{route('test.example.show',$question)}}" class="btn btn-outline-dark btn-sm">Back</a>
    <div class="container text-center">

        <h1>OUTPUT FOR Q{{$question->q_no}}</h1>

        <div class="jumbotron ">
            <pre>{{$output}}</pre>
        </div>
    </div>
    <p class="text-primary text-center">If you think the output is wrong, please check the file format and question number again.</p>


@endsection
