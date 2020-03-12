@extends('layouts.app')
@section('content')

        <a href="{{route('questions.index')}}" class="btn btn-sm btn-outline-dark">Go Back</a>
        <h3>Q{{$q->q_no}}</h3>
        <div class="text-body">
            {!! $q->question_text !!}
        </div>

@endsection
