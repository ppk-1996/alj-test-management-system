@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Questions Management</div>

                    <div class="card-body">
                        <a href="{{route('questions.create')}}" class="btn btn-primary mb-2">Add Question</a>

                        <table class="table table-striped">
                            <thead>
                            <th>No.</th>
                            <th>Question</th>
                            <th class="text-center">Action</th>
                            </thead>

                            @foreach($qs as $q)
                                <tbody>
                                <td>Q{{$q->q_no}}</td>
                                <td>{!!
                                Str::limit(strip_tags($q->question_text ),300)

                                !!}</td>
                                <td style=" display: flex; flex-direction: column;  ">
                                    <a href="{{route('questions.show',$q)}}" class="btn btn-success btn-sm">Show</a>
                                    <a href="{{route('questions.edit',$q)}}" class="btn btn-primary btn-sm">Edit</a>

                                    <form action="{{route('questions.destroy',$q)}}" method="POST"
                                          onsubmit="return confirm('Do you really want to delete this question?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning btn-sm" >Delete</button>
                                    </form>

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
