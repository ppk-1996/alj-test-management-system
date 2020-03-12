@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$user->name}}'s Answers</div>

                    <div class="card-body">


                        <div class="form-group">
                            @csrf
                            @method('PUT')

                            <p>Name : {{$user->name}}</p>
                            <p>Email : {{$user->email}}</p>
                            <p>Role : {{implode(', ',$user->roles->pluck('name')->toArray()) }}</p>
                            <p>Answers:</p>
                            @foreach($answers as $ans)
                                <h5>Q{{$ans->question->q_no}} Answer</h5>
                                <code>{!! $ans->answer_text !!}</code>
                            @endforeach

                        </div>


                    </div>
                </div>
@endsection
